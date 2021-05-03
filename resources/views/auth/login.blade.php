<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SNS</a>
            <div>
                <a href="/register" class="btn btn-primary">Register</a>
                <a href="/login" class="btn btn-primary">Login</a>
            </div>
        </div>
    </nav>
    <div class="container border rounded col-4 mt-5">
        <div class="mb-3 p-3">
            <form action="/login" method="post">
                @csrf
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="UserName" placeholder="Username" name="username">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control" id="Password" placeholder="Password" name="password">
                <button class="btn btn-primary mt-4">Login</button>
            </form>
        </div>
    </div>

</body>

</html>