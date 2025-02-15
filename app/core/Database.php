<?php
require_once __DIR__ . '/../config/config.php'; // Memasukkan konfigurasi database

class Database {
    private $host = DB_HOST; // Menggunakan konstanta dari config.php
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $dbh; // Database handler (PDO instance)
    private $stmt;
    public $pdo;

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct() {
        // Data Source Name (DSN) untuk PDO
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
        
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // Coba membuat koneksi menggunakan PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    // Fungsi untuk menjalankan query
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Fungsi untuk mengikat parameter ke query
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi query
    public function execute() {
        $this->stmt->execute();
    }

    // Ambil hasil query sebagai array
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu hasil dari query
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetch($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    // Mengembalikan jumlah baris yang dipengaruhi query
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
?>
