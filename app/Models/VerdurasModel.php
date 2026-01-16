<?php

namespace App\Models;

use CodeIgniter\Model;

class VerdurasModel extends Model
{
    protected $table = 'verduras';

    /**
     * @param false|string $slug
     *
     * @return array|null
     */
        

    public function getVerdurasMasVendidas()
    {
        $sql = $this->select('verduras.*, categorias.categoria');
        $sql = $this->join('categorias', 'verduras.id_categoria = categorias.id_categoria');
        $sql = $this->orderBy('verduras.n_ventas', 'DESC');
        $sql = $this->findAll(4);
        return $sql;
    }
}