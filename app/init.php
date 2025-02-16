<?php
// Load core classes
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/helpers.php';
require_once __DIR__ . '/core/Middleware.php';

// Load controllers, models, dan helpers
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/DashboardController.php';
require_once __DIR__ . '/controllers/PostController.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/middleware/AuthMiddleware.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/models/Post.php';
require_once __DIR__ . '/models/User.php';

// Start session (jika diperlukan)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>