<?php
include_once('conexionBD.php');



class Producto {
    private $conexion;

    public function __construct(ConexionBD $conexion) {
        $this->conexion = $conexion->conectar();
    }

    public function agregarProducto($nombre, $descripcion, $precio, $idCategoria) {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $descripcion, $precio, $idCategoria]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editarProducto($idProducto, $nombre, $descripcion, $precio, $idCategoria) {
        try {
            $stmt = $this->conexion->prepare("UPDATE productos SET nombre_producto = ?, descripcion = ?, precio = ?, id_categoria = ? WHERE id_producto = ?");
            $stmt->execute([$nombre, $descripcion, $precio, $idCategoria, $idProducto]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function eliminarProducto($idProducto) {
        try {
            $stmt = $this->conexion->prepare("DELETE FROM productos WHERE id_producto = ?");
            $stmt->execute([$idProducto]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarProductos() {
        try {
            $stmt = $this->conexion->query("SELECT p.*, c.nombre_categoria 
                                            FROM productos p 
                                            INNER JOIN categorias c ON p.id_categoria = c.id_categoria");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }


    public function obtenerProductoPorId($idProducto) {
        try {
            $stmt = $this->conexion->prepare("SELECT p.*, c.nombre_categoria 
                                            FROM productos p 
                                            INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                                            WHERE id_producto = ?");
            $stmt->execute([$idProducto]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
?>
