<?php

namespace App\Controllers;

use App\Models\VerdurasModel;

class Verduras extends BaseController
{
    public function verduras(): string
    {
        $model = model(VerdurasModel::class);

        $data = [
            'title' => 'BioEssential',
            'frutas' => $model->getVerduras(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/verduras',)
            . view('frontend/templates/footer');
    }
}