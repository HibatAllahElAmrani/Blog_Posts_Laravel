<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1 style="margin-left: 40vw; margin-top: 10rem; font-size: 50;">Edit post</h1>
  <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <div
      style="
        margin-left: 40vw;
        min-height: 20vh;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        gap: 0.8rem
    ">
      <input type="text" name="title" value="{{$post->title}}">
      <textarea name="body">{{$post->body}}</textarea>
      <button
        style="
          border: 0.5px solid black; 
          background-color: #84c8ffd2; 
          border-radius: 0.7rem; 
          padding: 0.3rem; 
          font-weight: bold;
      ">
        Save changes
      </button>
    </div>
  </form>
</body>
</html>