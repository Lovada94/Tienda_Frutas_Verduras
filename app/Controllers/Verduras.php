<?php

namespace App\Controllers;

use App\Models\VerdurasModel;

class Verduras extends BaseController
{
    public function verduras(): string
    {
        $model = model(VerdurasModel::class);

        $sort = $this->request->getGet('sort') ?? 'nombre';
        $dir  = strtolower($this->request->getGet('dir') ?? 'asc');

        $allowedSort = ['nombre', 'precio', 'n_ventas'];
        if (!in_array($sort, $allowedSort, true)) $sort = 'nombre';
        if (!in_array($dir, ['asc', 'desc'], true)) $dir = 'asc';

        $data = [
            'title' => 'Toas Nuestras Verduras',
            'verduras' => $model->getVerduras($sort, $dir),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/verduras',)
            . view('frontend/templates/footer');
    }
}