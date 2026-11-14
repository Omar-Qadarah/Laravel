<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <a href="{{route('listUsers')}}" class="btn btn-primary">
        Users list
    </a>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle border">
            <thead class="table-dark">
                <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
        
            <tbody>
                <tr>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                </tr>                 
            </tbody>
        </table>
    </div>
</body>
</html>