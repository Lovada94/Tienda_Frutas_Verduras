<?php

namespace App\Models;

use CodeIgniter\Model;

class EnvasadosModel extends Model
{
    protected $table = 'envasados';

    /**
     * @param false|string $slug
     *
     * @return array|null
     */
        

    public function getEnvasadosMasVendidos()
    {
        $sql = $this->select('envasados.*, categorias.categoria');
        $sql = $this->join('categorias', 'envasados.id_categoria = categorias.id_categoria');
        $sql = $this->orderBy('envasados.n_ventas', 'DESC');
        $sql = $this->findAll(4);
        return $sql;
    }

    public function getEnvasados()
    {
        $sql = $this->select('envasados.*, categorias.categoria');
        $sql = $this->join('categorias', 'envasados.id_categoria = categorias.id_categoria');
        $sql = $this->findAll();
        return $sql;
    }
}