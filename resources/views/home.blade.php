<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <p>You're logged in!</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    @else
    <div style="border: 3px solid black;">
        <h2>Registration</h2>
        <form action="/register" method="POST">
            @csrf
            <input name='name' type="text" placeholder="Name">
            <input name='email' type="text" placeholder="Email">
            <input name='password' type="password" placeholder="Password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name='loginname' type="text" placeholder="Name">
            <input name='loginpassword' type="password" placeholder="Password">
            <button>Log in</button>
        </form>
    </div>
    @endauth

</body>
</html>