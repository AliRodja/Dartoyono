<?php
class Router {
    private $routes = [];

    // Tambahkan route
    public function addRoute($method, $uri, $controller, $action, $middlewares = []) {
        $this->routes[$method][$uri] = [$controller, $action, $middlewares];
    }
    

    public function dispatch()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    if (!isset($this->routes[$method])) {
        http_response_code(404);
        echo "404 Not Found - Method Tidak Terdaftar";
        return;
    }

    if (isset($this->routes[$method][$uri])) {
        $action = $this->routes[$method][$uri];

        // 🔹 Jalankan middleware jika ada
        if (isset($action[2]) && is_array($action[2])) {
            foreach ($action[2] as $middleware) {
                Middleware::run($middleware);
            }
        }

        // 🔹 Jalankan controller & method yang sesuai
        [$controllerName, $methodName] = $action;

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

        // 🔹 Cek apakah method butuh parameter
        $reflection = new ReflectionMethod($controller, $methodName);
        $params = $reflection->getParameters();

        if (count($params) > 0) {
            if (!isset($_SESSION['user']['user_id'])) {
                http_response_code(403);
                echo "Error: User ID tidak ditemukan dalam session.";
                return;
            }

            $userId = $_SESSION['user']['user_id'];
            $controller->$methodName($userId); // ✅ Kirim userId ke method
        } else {
            $controller->$methodName();
        }

        return;
    }

    http_response_code(404);
    echo "404 Not Found - Route Tidak Ditemukan";
}



}
?>