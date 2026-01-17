<?php

namespace App\Controllers;

use App\Models\FrutasModel;

class Frutas extends BaseController
{
    public function frutas(): string
    {
        $model = model(FrutasModel::class);

        $data = [
            'title' => 'Todas Nuestras Frutas',
            'frutas' => $model->getFrutas(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/frutas',)
            . view('frontend/templates/footer');
    }
}