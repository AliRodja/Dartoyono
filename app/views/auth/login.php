<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
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

        .container1 {
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
            margin-bottom: 50px;
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        h2 {
            margin-top: 20px;
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
            margin-top: -20px;
            margin-bottom: 20px;
        }

        .options label {
            padding-top: 20px;
        }

        .options a {
            text-decoration: none;
            color: black;
            transition: color 0.3s;
        }

        .options a:hover {
            color: black;
        }

        button {
            padding: 15px;
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
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            border: none;
            margin-top: 15px;
        }

        .btn-custom:hover {
            background: #5a3c2e;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Menambahkan bayangan saat hover */
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
            background: url('/images/bg.jpg') no-repeat center center/cover;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
            position: relative;
        }

        .illustration::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay hitam dengan opacity 50% */
            z-index: 1;
        }

        .illustration-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .illustration-text h2, .illustration-text p {
            margin: 0;
            padding: 0;
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

            button {
                width: 100%; /* Pastikan tombol memenuhi lebar penuh layar kecil */
                padding: 15px;
                font-size: 16px;
                margin-top: 20px;
            }
        }

    </style>
</head>
<body>
    <div class="container1">
        <div class="login-form">
            <a href="/">
                <img src="/images/dartoyo_logo.png" alt="Logo" class="logo">
            </a>
            <h2>Sign in</h2>
            
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
            <div class="illustration-text">
                <h2>Sign in to name</h2>
                <p>Lorem Ipsum is simply</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>
