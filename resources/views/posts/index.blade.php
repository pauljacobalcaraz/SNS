<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SNS</a>
            <div>
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="posts-container rounded p-2 mt-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/posts" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating">
                                <textarea name="body" class="form-control" placeholder="Add Post here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">New Post</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="main-post-container">
            <div class="post-container bg-light">
                <div class="post-header">
                    <div class="username-container">
                        <img src="https://via.placeholder.com/90" width="90" />
                        <p>
                            by <strong>{{$post->user->firstname. ' ' . $post->user->lastname}}</strong>
                            @ {{$post->user->username}} <br><small>{{$post->created_at->diffForHumans()}}</small><br>
                        </p>
                    </div>
                    @if(Session::get('user')->id == $post->user->id)
                    <div class="post-setting">
                        <a href="/posts/{{$post->id}}/edit">
                            <button class="btn border">Edit</button>
                        </a>
                        <form action="/posts/{{$post->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn border">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="post-container-body">
                    <p>
                        {{$post->body}}
                    </p>

                </div>
                <div class="container-fluid border-bottom p-2 d-flex justify-content-between">
                    @if($user->likes->contains('post_id',$post->id))
                    @php $like = $user->likes->where('post_id', $post->id)->first(); @endphp
                    <form action="/likes/{{$like->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn m-0 border">Unlike</button>
                    </form>
                    @else
                    <form action="/posts/{{$post->id}}/likes" method="post">
                        @csrf
                        <p>
                            <button class="btn-like btn border">Like </button>
                        </p>
                    </form>
                    @endif
                    <p>Likes
                        {{$post->likes->count()}}
                    </p>
                </div>
                @if($post->comments->count() == 0)
                <span>
                    {{$post->comments->count()}} comment/s
                    </a>
                    @else
                    <a href="#" class="comment-count" data-postId="{{$post->id}}">
                        {{$post->comments->count()}} comment/s
                    </a>
                    @endif
                    <div class="comments-container cc-{{$post->id}}">
                        @foreach($post->comments as $comment)
                        <div class="comment-container">
                            <div class="comment-header">
                                <div class="comment-username-container">
                                    <img src="https://via.placeholder.com/70" width="70" />
                                    <p>
                                        by <strong>{{$comment->user->firstname. ' ' . $comment->user->lastname}}</strong>
                                        @ {{$comment->user->username}} <br><small>{{$comment->created_at->diffForHumans()}}</small><br>
                                    </p>
                                </div>
                                @if(Session::get('user')->id == $comment->user->id)
                                <div class="post-setting">
                                    <a href="/comments/{{$comment->id}}/edit">
                                        <button>Edit</button>
                                    </a>
                                    <form action="/comments/{{$comment->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            <div class="comment-body-container">
                                <p>
                                    {{$comment->body}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="comments-form-container bg-light container-fluid">
                <form action="/posts/{{$post->id}}/comments" method="post">
                    @csrf
                    <div class="type-comment-container">
                        <div class="form-floating">
                            <textarea class="form-control" name="body" placeholder="Add comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Add Comment</label>
                        </div>
                        <button class="btn-post-comment btn-primary btn mt-2 col-2">
                            <small>
                                Post Comment
                            </small>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>