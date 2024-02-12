<?php 
include('conexionBD.php');


class Usuario {
    private string $nombre;
    private string $correo;
    private string $password;
    private $conexion;

    public function __construct(ConexionBD $conexion) {
        $this->conexion = $conexion->conectar();
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setCorreo(string $correo): void {
        $this->correo = $correo;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCorreo(): string {
        return $this->correo;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function registroUsuario() {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO usuario (nombre, correo, password) VALUES (?, ?, ?)");
            $stmt->execute(array($this->nombre, $this->correo, $this->password));
            $count = $stmt->rowCount();
            echo $this->columnasAfectadas($count);
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
        }
    }


    public function iniciarSesion() {
        try {
            $stm = $this->conexion->prepare("SELECT * FROM usuario WHERE correo=? AND password=?");
            $stm->execute(array($this->correo, $this->password));
            $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    
            if ($usuario) {
                echo 'Login exitoso';
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                header('Location: carrito.php');
            } else {
                echo 'Correo o contraseÃ±a incorrectos';
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    private function columnasAfectadas($count): string {
        if ($count > 0) {
            return "Operación realizada correctamente";
        } else {
            return "Error al realizar la operación";
        }
    }
}
?>
