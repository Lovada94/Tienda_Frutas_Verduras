<?php

namespace App\Controllers;

use App\Models\FrutasModel;
use App\Models\VerdurasModel;
use App\Models\EnvasadosModel;
use App\Models\RandomModel;

class Inicio extends BaseController
{
    public function index(): string
    {
        $modelFrutas = model(FrutasModel::class);
        $modelVerduras = model(VerdurasModel::class);
        $modelEnvasados = model(EnvasadosModel::class);
        $randomM = model(RandomModel::class);

        $data = [
            'title' => 'BioEssential',
            'frutas' => $modelFrutas->getFrutasMasVendidas(),
            'verduras' => $modelVerduras->getVerdurasMasVendidas(),
            'envasados' => $modelEnvasados->getEnvasadosMasVendidos(),
            'random'    => $randomM->getRandomProduct(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/index',)
            . view('frontend/templates/footer');
    }
}
