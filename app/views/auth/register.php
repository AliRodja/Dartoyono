<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Register</title>
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

        .register-form {
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

        input, select {
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

            .register-form {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .register-form {
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
        <div class="register-form">
            <div class="logo">
                <img src="img/dartoyo_logo.png" alt="Logo">
            </div>
            <h2>Create an Account</h2>
            <p>If you already have an account, you can <a href="/login">Login here</a></p>
            <form method="POST" action="/register">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="johndoe123" required>
                
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" placeholder="John Doe" required>
                
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="johndoe@example.com" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" required>
                
                <label for="gender">Gender</label>
                <select name="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
                
                <button class="btn-custom" type="submit">Register</button>
            </form>
        </div>
        <div class="illustration">
            <img src="https://source.unsplash.com/1600x900/?coffee,cafe" alt="Illustration">
            <div class="illustration-text">
                <h2>Join Us Now</h2>
                <p>Be part of our community and enjoy the benefits</p>
            </div>
        </div>
    </div>
    
</body>
</html>
