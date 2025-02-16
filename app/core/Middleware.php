<?php

class Middleware {
    protected static $middlewares = [];

    // 🔹 Method untuk menambahkan middleware
    public static function add($name, $callback) {
        self::$middlewares[$name] = $callback;
    }

    // 🔹 Method untuk menjalankan middleware berdasarkan nama
    public static function run($name) {
        if (isset(self::$middlewares[$name])) {
            call_user_func(self::$middlewares[$name]); // 🔹 Jalankan middleware
        } else {
            throw new Exception("Middleware '$name' tidak ditemukan.");
        }
    }
}


?>