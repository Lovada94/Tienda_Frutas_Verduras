<?php

namespace App\Controllers;

use App\Models\FrutasModel;
use App\Models\VerdurasModel;
use App\Models\EnvasadosModel;
use App\Models\CategoriasModel;

class Inicio extends BaseController
{
    public function index(): string
    {
        $modelFrutas = model(FrutasModel::class);
        $modelVerduras = model(VerdurasModel::class);
        $modelEnvasados = model(EnvasadosModel::class);

        $data = [
            'title' => 'BioEssential',
            'frutas' => $modelFrutas->getFrutasMasVendidas(),
            'verduras' => $modelVerduras->getVerdurasMasVendidas(),
            'envasados' => $modelEnvasados->getEnvasadosMasVendidos(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/index',)
            . view('frontend/templates/footer');
    }
}
