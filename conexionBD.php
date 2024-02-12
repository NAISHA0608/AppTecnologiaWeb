<?php 
class ConexionBD {
    private $server = "localhost";
    private $database = "Usuariosjg";
    private $username = "root";
    private $password = "";
    private $conexion;

    public function conectar(){
        try {
            $this->conexion = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            // Configuración para manejar excepciones de PDO
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            // Manejar la excepción de manera adecuada (puedes imprimir un mensaje, registrar el error, etc.)
            die("Error de conexión: " . $e->getMessage());
        }
    }
    public function cerrarConexion(){ 
        $this->conexion = null;
    }
}
?>


