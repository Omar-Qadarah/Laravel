<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'orderitems.product'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();

        return view('orders.create', compact('users', 'products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ], [
            'products.*.product_id.required' => 'Please select a product for your order.',
            'products.*.quantity.required' => 'Please enter the product quantity.',
            'products.*.quantity.min' => 'Product quantity must be at least 1.',
        ]);

        DB::transaction(function () use ($validated) {

            $order = Order::create([
                'user_id' => $validated['user_id'],
            ]);

            foreach ($validated['products'] as $item) {

                $product = Product::whereKey($item['product_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($item['quantity'] > $product->quantity) {
                    throw ValidationException::withMessages([
                        'products' => "Only {$product->quantity} units of {$product->name} are available.",
                    ]);
                }

                $order->orderitems()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                ]);

                $product->decrement('quantity', $item['quantity']);
            }
        });

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load('orderitems.product');

        $users = User::all();
        $products = Product::all();

        return view('orders.edit', compact('order', 'users', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated, $order) {

            /** @var \App\Models\Orderitem $oldItem */
            $oldItem = $order->orderitems()->firstOrFail();

            $oldProduct = Product::whereKey($oldItem->product_id)
                ->lockForUpdate()->firstOrFail();

            $oldProduct->increment('quantity', $oldItem->quantity);

            $newProduct = Product::whereKey($validated['product_id'])
                ->lockForUpdate()->firstOrFail();

            if ($validated['quantity'] > $newProduct->quantity) {
                throw ValidationException::withMessages([
                    'quantity' => "Only {$newProduct->quantity} units are available.",
                ]);
            }

            $newProduct->decrement('quantity', $validated['quantity']);

            $order->update(['user_id' => $validated['user_id']]);

            $oldItem->update([
                'product_id' => $newProduct->id,
                'quantity' => $validated['quantity'],
            ]);
        });

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        DB::transaction(function () use ($order) {

            $items = $order->orderitems()->get();

            foreach ($items as $item) {

                $product = Product::whereKey($item->product_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $product->increment('quantity', $item->quantity);
            }

            $order->orderitems()->delete();

            $order->delete();
        });

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully!');
    }
}
