<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias() {
        $sql = "SELECT * FROM categorias";
        return $this->selectAll($sql);

    }

    public function getProducto($id_producto) {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id = $id_producto";
        return $this->select($sql);

    }

    //Paginacion
    public function getProductos($desde, $porPagina) {
        $sql = "SELECT * FROM productos LIMIT $desde, $porPagina";
        return $this->selectAll($sql);

    }

    //Obtener el total de productos
    public function getTotalProductos() {
        $sql = "SELECT COUNT(*) AS total FROM productos";
        return $this->select($sql);

    }

    //Productos Relacionados con la Categorias
    public function getProductosCat($id_categoria, $desde, $porPagina) {
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);

    }

     //Obtener el total de Productos relacionado con su categoria
     public function getTotalProductosCat($id_categoria) {
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE id_categoria = $id_categoria";
        return $this->select($sql);

    }

    //Productos Relacionados con la Categorias en Detalles del Producto Seleccionado
    public function getAleatorios($id_categoria, $id_producto) {
        $sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id != $id_producto ORDER BY RAND() LIMIT 12";
        return $this->selectAll($sql);

    }

    /*
    //Obtener Productos a partit de la Lista Deseos
    public function getListaDeseo($id_producto) {
        $sql = "SELECT * FROM productos WHERE id = $id_producto";
        return $this->select($sql);

    }
    */

}
 
?>