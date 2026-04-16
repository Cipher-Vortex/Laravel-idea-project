    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .register-box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-box button {
            width: 100%;
            padding: 10px;
            background: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-box button:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>register</h2>

        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button data-test="register-button" type="submit">register</button>
        </form>
                <span class="siginrow">Have a account <a href="/login" >Login</a></span>

    </div>

</body>
</html>

<x-layout>

  
 <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Login</legend>
 <div class="register-box">
        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <button  data-test="register-button" class="btn btn-neutral mt-4">Register</button>
        </form>
                <span class="siginrow">Have a account <a href="/login" >Login</a></span>

    </div>


</fieldset>
</x-layout>