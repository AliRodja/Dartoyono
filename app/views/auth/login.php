<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .login-form {
            flex: 1;
            padding: 40px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        button {
            padding: 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-custom {
            background: #6f4e37;
            color: white;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
            border: none;
        }
        .btn-custom:hover {
            background: #5a3c2e;
            transform: scale(1.05);
        }

        .social-login {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .social-login a img {
            width: 40px;
            height: 40px;
        }

        .illustration {
            flex: 1;
            background-color: #c49a6c;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .illustration-text {
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .illustration {
                display: none;
            }
            
            .login-form {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 15px;
            }
            
            h2 {
                font-size: 18px;
            }
            
            .options {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .options a {
                margin-top: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <img src="img/dartoyo_logo.png" alt="Logo" class="logo">
            <h2>Sign in</h2>
            <p>If you don't have an account register<br>
               You can <a href="/register">Register here!</a></p>
            <form method="POST" action="/login">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email address" required name="email">
                
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required name="password">
                
                <div class="options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                
                <button class="btn-custom" type="submit">Login</button>
            </form>
            
        </div>
        <div class="illustration">
            <img src="img/bg.jpg" alt="Illustration">
            <div class="illustration-text">
                <h2>Sign in to name</h2>
                <p>Lorem Ipsum is simply</p>
            </div>
        </div>
    </div>
</body>
</html>
