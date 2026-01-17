<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    public function getProductos(string $sort = 'nombre', string $dir = 'asc'): array
    {
        $db = db_connect();
        $dir = strtolower($dir) === 'desc' ? 'DESC' : 'ASC';

        // Ojo: ordenamos por alias comunes del UNION (nombre, precio, n_ventas)
        $sql = "
            SELECT
                'fruta' AS tipo,
                f.id_fruta      AS id_producto,
                f.nombre,
                f.precio,
                f.imagen,
                f.n_ventas,
                f.fecha_adq,
                NULL            AS fecha_cad,
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
                v.fecha_adq,
                NULL            AS fecha_cad,
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
                e.fecha_adq,
                e.fecha_cad     AS fecha_cad,
                c.categoria
            FROM envasados e
            JOIN categorias c ON c.id_categoria = e.id_categoria

            ORDER BY {$sort} {$dir}
        ";

        return $db->query($sql)->getResultArray();
    }

    public function getProductosPorCategoria(string $categoria, string $sort = 'nombre', string $dir = 'asc'): array
    {
        $db = db_connect();
        $dir = strtolower($dir) === 'desc' ? 'DESC' : 'ASC';

        $sql = "
            SELECT * FROM (
                SELECT
                    'fruta' AS tipo,
                    f.id_fruta      AS id_producto,
                    f.nombre,
                    f.precio,
                    f.imagen,
                    f.n_ventas,
                    f.fecha_adq,
                    NULL            AS fecha_cad,
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
                    v.fecha_adq,
                    NULL            AS fecha_cad,
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
                    e.fecha_adq,
                    e.fecha_cad     AS fecha_cad,
                    c.categoria
                FROM envasados e
                JOIN categorias c ON c.id_categoria = e.id_categoria
            ) t
            WHERE t.categoria = ?
            ORDER BY {$sort} {$dir}
        ";

        return $db->query($sql, [$categoria])->getResultArray();
    }
}