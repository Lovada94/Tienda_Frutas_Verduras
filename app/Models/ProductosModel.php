<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    private function peticionSql(): string
    {
        return "
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
        ";
    }

    public function getProductos(): array
    {
        $db = db_connect();
        $sql = $this->peticionSql();
        return $db->query($sql)->getResultArray();
    }

    public function getProductosPorCategoria($categoria): array
    {
        $db = db_connect();

        $sql = "
            SELECT * FROM (
                {$this->peticionSql()}
            ) t
            WHERE LOWER(t.categoria) = LOWER(?)
            ORDER BY t.n_ventas DESC
        ";

        return $db->query($sql, [$categoria])->getResultArray();
    }
}