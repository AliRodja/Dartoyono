<?php
class App {
    protected $router;

    public function __construct() {
        // Inisialisasi router
        $this->router = new Router();

        // Tambahkan route
        $this->addRoutes();

        // Jalankan router
        $this->router->dispatch();
    }

    // Route
    protected function addRoutes() {
        // Auth Routes (tanpa middleware)
        $this->router->addRoute('GET', '/login', 'AuthController', 'login'); // Form login
        $this->router->addRoute('POST', '/login', 'AuthController', 'login'); // Proses login
        $this->router->addRoute('GET', '/register', 'AuthController', 'register'); // Form register
        $this->router->addRoute('POST', '/register', 'AuthController', 'register'); // Proses register
        $this->router->addRoute('GET', '/logout', 'AuthController', 'logout'); // Logout
    
        // Dashboard & Profile (Harus Login)
        $this->router->addRoute('GET', '/dashboard', 'DashboardController', 'index', ['auth']);
        $this->router->addRoute('GET', '/profile', 'UserController', 'showProfile', ['auth']);
        $this->router->addRoute('POST', '/update_profile', 'UserController', 'updateProfile', ['auth']);
    
        // Post Routes (Harus Login)
        $this->router->addRoute('GET', '/create_post', 'PostController', 'showCreateForm', ['auth']);
        $this->router->addRoute('POST', '/store_post', 'PostController', 'create', ['auth']);
        $this->router->addRoute('GET', '/edit_post/{id}', 'PostController', 'editPost', ['auth']);
        $this->router->addRoute('POST', '/update_post/{id}', 'PostController', 'updatePost', ['auth']);
        $this->router->addRoute('GET', '/delete_post/{id}', 'PostController', 'deletePost', ['auth']);
    
        // Public Routes (Tanpa Middleware)
        $this->router->addRoute('GET', '/', 'HomeController', 'index'); // Halaman utama (tanpa login)
        $this->router->addRoute('GET', '/view_post/{id}', 'PostController', 'viewPost'); // Lihat post tanpa login
    }
    
}
?>