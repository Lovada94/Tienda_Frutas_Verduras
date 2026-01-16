<?php

namespace App\Models;

use CodeIgniter\Model;

class RandomModel extends Model
{
    public function getRandomProduct()
    {
        $db = db_connect();

        // UNION ALL: unificamos las 3 tablas con columnas comunes
        $sql = "
            SELECT 'fruta_verdura' AS tipo, 'productos/frutas' AS ruta,
                   f.id_fruta AS id_producto, f.nombre, f.precio, f.imagen, c.categoria
            FROM frutas f
            JOIN categorias c ON c.id_categoria = f.id_categoria

            UNION ALL

            SELECT 'fruta_verdura' AS tipo, 'productos/verduras' AS ruta,
                   v.id_verdura AS id_producto, v.nombre, v.precio, v.imagen, c.categoria
            FROM verduras v
            JOIN categorias c ON c.id_categoria = v.id_categoria

            UNION ALL

            SELECT 'envasados' AS tipo, 'productos/envasados' AS ruta,
                   e.id_envasados AS id_producto, e.nombre, e.precio, e.imagen, c.categoria
            FROM envasados e
            JOIN categorias c ON c.id_categoria = e.id_categoria

            ORDER BY RAND()
            LIMIT 1
        ";

        $row = $db->query($sql)->getRowArray();
        return $row ?: null;
    }
}