<?php
include('conexionBD.php');
class Categoria {
    private $conexion;

    public function __construct(ConexionBD $conexion) {
        $this->conexion = $conexion->conectar();
    }

    public function agregarCategoria($nombreCategoria) {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");
            $stmt->execute([$nombreCategoria]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editarCategoria($idCategoria, $nuevoNombre) {
        try {
            $stmt = $this->conexion->prepare("UPDATE categorias SET nombre_categoria = ? WHERE id_categoria = ?");
            $stmt->execute([$nuevoNombre, $idCategoria]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function eliminarCategoria($idCategoria) {
        try {
            $stmt = $this->conexion->prepare("DELETE FROM categorias WHERE id_categoria = ?");
            $stmt->execute([$idCategoria]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarCategorias() {
        try {
            $stmt = $this->conexion->query("SELECT * FROM categorias");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }



    public function obtenerCategoriaPorId($idCategoria) {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
            $stmt->execute([$idCategoria]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}


?>
