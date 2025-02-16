<?php
class Router {
    private $routes = [];

    // Tambahkan route
    public function addRoute($method, $uri, $controller, $action, $middlewares = []) {
        // Ubah {id} menjadi regex untuk menangkap angka
        $pattern = str_replace('/', '\/', preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([0-9]+)', $uri));
        $this->routes[$method][$pattern] = [$controller, $action, $middlewares];
    }
    
    

    public function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
    
        if (!isset($this->routes[$method])) {
            http_response_code(404);
            echo "404 Not Found - Method Tidak Terdaftar";
            return;
        }
    
        // Loop semua routes untuk mencari kecocokan pola
        foreach ($this->routes[$method] as $pattern => $action) {
            if (preg_match("#^" . $pattern . "$#", $uri, $matches)) {
                array_shift($matches); // Hapus elemen pertama karena berisi seluruh URI
    
                [$controllerName, $methodName, $middlewares] = $action;
    
                // 🔹 Jalankan middleware jika ada
                if (!empty($middlewares)) {
                    foreach ($middlewares as $middleware) {
                        Middleware::run($middleware);
                    }
                }
    
                // 🔹 Pastikan Controller dan Method ada
                if (!class_exists($controllerName)) {
                    http_response_code(500);
                    echo "Error: Controller '$controllerName' tidak ditemukan.";
                    return;
                }
    
                $controller = new $controllerName();
    
                if (!method_exists($controller, $methodName)) {
                    http_response_code(500);
                    echo "Error: Method '$methodName' tidak ditemukan di '$controllerName'.";
                    return;
                }
                if (!empty($matches)) {
                    $controller->$methodName(...$matches);
                } else {
                    $controller->$methodName();
                }
                return;
            }
        }
    
        http_response_code(404);
        echo "404 Not Found - Route Tidak Ditemukan";
    }    
}
?>