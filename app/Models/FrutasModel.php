<?php

namespace App\Models;

use CodeIgniter\Model;

class FrutasModel extends Model
{
    protected $table = 'frutas';

    /**
     * @param false|string $slug
     *
     * @return array|null
     */


    public function getFrutasMasVendidas()
    {
        $sql = $this->select('frutas.*, categorias.categoria');
        $sql = $this->join('categorias', 'frutas.id_categoria = categorias.id_categoria');
        $sql = $this->orderBy('frutas.n_ventas', 'DESC');
        $sql = $this->findAll(4);
        return $sql;
    }

    public function getFrutas()
    {
        $sql = $this->select('frutas.*, categorias.categoria');
        $sql = $this->join('categorias', 'frutas.id_categoria = categorias.id_categoria');
        $sql = $this->findAll();
        return $sql;
    }
}
