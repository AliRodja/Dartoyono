<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dartoyo Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #F5E6E0;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            color: #333 !important;
        }
        
        .btn-sign-in {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-sign-in:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .hero-section {
            padding: 80px 0;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: bold;
            line-height: 1.2;
        }
        
        .coffee-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .space-section {
            background-color: var(--secondary-color);
            padding: 80px 0;
        }
        
        .space-title {
            font-size: 3.5rem;
            font-weight: bold;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <a class="navbar-brand" href="/">DARTOYO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                </ul>
                <?php
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    if (!empty($_SESSION['user']['user_id'])) {
                        $username = $_SESSION['user']['full_name'];
                        $email = $_SESSION['user']['username'];
                        $role = $_SESSION['user']['role'];
                    ?>
                        <div class="dropdown">
                            <button class="btn btn-sign-in dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li><span class="dropdown-item-text fw-bold"><?= htmlspecialchars($username); ?></span></li>
                                <li><a class="dropdown-item text-primary" href="/profile/<?php echo $_SESSION['user']['user_id']; ?>">Profile</a></li>
                                <?php if ($role === 'writer') : ?>
                                    <li><a class="dropdown-item text-primary" href="/dashboard">Dashboard</a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    <?php
                    } else {
                        echo '<a href="/login"><button class="btn btn-sign-in">Sign in</button></a>';
                    }
                    ?>
            </div>
        </div>
    </nav>