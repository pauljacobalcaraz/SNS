<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>

    <form action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
        <textarea name="body" cols="30" rows="10">{{$post->body}}</textarea><br>
        <button>Add Post</button>
    </form>

</body>

</html>