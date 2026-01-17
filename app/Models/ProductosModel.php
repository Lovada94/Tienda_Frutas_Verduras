<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    /**
     * @param false|string $slug
     *
     * @return array|null
     */


    public function getProductos()
    {

        $db = db_connect();

        $sql = "
            SELECT
                'fruta' AS tipo,
                f.id_fruta      AS id_producto,
                f.nombre,
                f.precio,
                f.imagen,
                f.n_ventas,
                c.categoria
            FROM frutas f
            JOIN categorias c ON c.id_categoria = f.id_categoria

            UNION ALL

            SELECT
                'verdura' AS tipo,
                v.id_verdura    AS id_producto,
                v.nombre,
                v.precio,
                v.imagen,
                v.n_ventas,
                c.categoria
            FROM verduras v
            JOIN categorias c ON c.id_categoria = v.id_categoria

            UNION ALL

            SELECT
                'envasados'     AS tipo,
                e.id_envasados  AS id_producto,
                e.nombre,
                e.precio,
                e.imagen,
                e.n_ventas,
                c.categoria
            FROM envasados e
            JOIN categorias c ON c.id_categoria = e.id_categoria

        ";

        return $db->query($sql)->getResultArray();
    }
}
