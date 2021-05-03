<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>

<body>
    <h1>Edit Comment</h1>

    <form action="/comments/{{$comment->id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="body" value="{{$comment->body}}">
        <br>
        <button>Save</button>
    </form>

</body>

</html>