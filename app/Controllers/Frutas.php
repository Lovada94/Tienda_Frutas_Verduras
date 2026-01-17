<?php

namespace App\Controllers;

use App\Models\FrutasModel;

class Frutas extends BaseController
{
    public function frutas(): string
    {
        $model = model(FrutasModel::class);

        $sort = $this->request->getGet('sort') ?? 'nombre';
        $dir  = strtolower($this->request->getGet('dir') ?? 'asc');

        $allowedSort = ['nombre', 'precio', 'n_ventas'];
        if (!in_array($sort, $allowedSort, true)) $sort = 'nombre';
        if (!in_array($dir, ['asc', 'desc'], true)) $dir = 'asc';

        $data = [
            'title' => 'Todas Nuestras Frutas',
            'frutas' => $model->getFrutas($sort, $dir),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/frutas',)
            . view('frontend/templates/footer');
    }
}