<?php

namespace App\Controllers;

use App\Models\EnvasadosModel;

class Envasados extends BaseController
{
    public function envasados(): string
    {
        $model = model(EnvasadosModel::class);

        $data = [
            'title' => 'Todas Nuestros Envasados',
            'envasados' => $model->getEnvasados(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/envasados',)
            . view('frontend/templates/footer');
    }
}