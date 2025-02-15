<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?coffee,cafe') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 15px;
            background: #4b3621;
            color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }
        .form-control {
            border-radius: 10px;
            background: #d2b48c;
            border: none;
            color: #4b3621;
        }
        .form-control::placeholder {
            color: #6b4226;
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
        .form-label i {
            margin-right: 5px;
            color: #c49a6c;
        }
        .card-header {
            background: transparent;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
            color: #f4e1c6;
        }
        .input-group-text {
            background: #6f4e37;
            color: white;
            border: none;
        }
        a {
            color: #c49a6c;
        }
        a:hover {
            color: #f4e1c6;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4">
            <div class="card-header">
                <i class="fas fa-coffee"></i>Login
            </div>
            <div class="card-body">
                <form method="POST" action="/login">
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="e.g., johndoe@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom"><i class="fas fa-sign-in-alt"></i> Login</button>
                    </div>
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="/register">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
