<?php

namespace App\Controllers;

use App\Models\EnvasadosModel;

class Envasados extends BaseController
{
    public function envasados(): string
    {
        $model = model(EnvasadosModel::class);

        $sort = $this->request->getGet('sort') ?? 'nombre';
        $dir  = strtolower($this->request->getGet('dir') ?? 'asc');

        $allowedSort = ['nombre', 'precio', 'n_ventas'];
        if (!in_array($sort, $allowedSort, true)) $sort = 'nombre';
        if (!in_array($dir, ['asc', 'desc'], true)) $dir = 'asc';

        $data = [
            'title' => 'Todas Nuestros Envasados',
            'envasados' => $model->getEnvasados($sort, $dir),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/envasados',)
            . view('frontend/templates/footer');
    }
}