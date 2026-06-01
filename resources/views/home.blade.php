<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Laravel App</title>
</head>
<body>

  @auth
  <div style="
    display: flex; 
    align-items: center; 
    flex-direction: column;
  ">
    <h2>
      Congrats ! You are logged in !!
    </h2>

    <form action="/logout" method="POST">
      @csrf
      <button 
      style="
        border: 1px solid black; 
        background-color: #FF9A86; 
        border-radius: 1.3rem; 
        padding: 0.6rem; 
        font-weight: bold;
      ">
        Log out
      </button>
    </form>
    
    <form action="/create-post" method="POST">
        @csrf
      <div
        style=
          "border: 2px solid black;
          padding: 1rem; 
          margin: 2rem;
          min-height: 20vh;
          border-radius: 15px;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          gap: 0.8rem
      ">
        <h4>Create New Post</h4>
        
        <input type="text" name="title" placeholder="Your title here">
        <textarea style="min-height: 1.5rem;"name="body" placeholder="Body content..."></textarea>
        <button
          style="
              border: 0.5px solid black; 
              background-color: #B5BAFF; 
              border-radius: 0.7rem; 
              padding: 0.3rem; 
              font-weight: bold;
              margin-left: 1rem;
        ">
          Post
        </button>
    </div>
    
    </form>
  </div>

  <div 
    style="
      border: 2px solid black;
      padding: 1rem; 
      margin: 2rem;
      min-height: 20vh;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 0.8rem
  ">
    <h2>
      My Posts
    </h2>
    @foreach($posts as $post)
    <div
      style="
        background-color: #D9F9DF;
        padding: 10px;
        margin 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 0.8rem
    ">
      <h3>{{$post['title']}}</h3>
      {{$post['body']}}
      <div
        style="
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: row;
          gap: 0.8rem
      ">
        <button
          style="
            border: 0.5px solid black; 
            background-color: #b5deffa2; 
            border-radius: 0.7rem; 
            padding: 0.3rem; 
            font-weight: bold;
        ">
        <a href="/edit-post/{{$post->id}}" style="color: black; text-decoration: none;">Edit</a>
      </button>
      <form action="/edit-post/{{$post->id}}" method="POST" style="margin: 0">
        @csrf
        @method('DELETE')
        <button
          style="
            border: 0.5px solid black; 
            background-color: #ff8181; 
            border-radius: 0.7rem; 
            padding: 0.3rem; 
            font-weight: bold;
        ">
          Delete
        </button>
      </form>

      </div>
      
    </div>
    @endforeach
  </div>
  
  @else
    <div 
    style=
      "border: 2px solid black;
      padding: 1rem; 
      margin: 2rem;
      height: 80vh;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      ">
      <h2 style="font-size: 42">
        Registeration
      </h2>
      <form action="/register" method="POST"
      >
        @csrf
        <div 
        style="
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          gap: 1rem
        ">
          <input 
            type="text" 
            name="name" 
            placeholder="Name" 
            style="
              height: 25px;
              border-radius: 10px; 
              border: 1px solid black;
              padding: 0.4rem;
          ">
          <input 
            type="text" 
            name="email" 
            placeholder="Email" 
            style="
              height: 25px; 
              border-radius: 10px; 
              border: 1px solid black;
              padding: 0.4rem;
          ">
          <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            style="
              height: 25px; 
              border-radius: 10px; 
              border: 1px solid black;
              padding: 0.4rem;
          ">
          <button 
            style="
              border: 0.5px solid black; 
              background-color: #B5BAFF; 
              border-radius: 1.3rem; 
              padding: 0.4rem; 
              font-weight: bold;
              margin-left: 1rem;
          ">
            Register
          </button>
        </div>
      </form>
    </div>


    <div 
    style=
      "border: 2px solid black;
      padding: 1rem; 
      margin: 2rem;
      height: 80vh;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      ">
      <h2 style="font-size: 42">
        Log in to existing account
      </h2>
      <form 
        action="/login" 
        method="POST"
      >
        @csrf
        <div 
        style="
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          gap: 1rem
        ">
          <input 
            type="text" 
            name="loginName" 
            placeholder="Name" 
            style="
              height: 25px;
              border-radius: 10px; 
              border: 1px solid black;
              padding: 0.4rem;
          ">
          <input 
            type="password" 
            name="loginPassword" 
            placeholder="Password" 
            style="
              height: 25px; 
              border-radius: 10px; 
              border: 1px solid black;
              padding: 0.4rem;
          ">
          <button 
            style="
              border: 0.5px solid black; 
              background-color: #F9B2D7; 
              border-radius: 1.3rem; 
              padding: 0.4rem; 
              font-weight: bold;
              margin-left: 1rem;
          ">
            Log in
          </button>
        </div>
      </form>
    </div>
  @endauth



</body>
</html>