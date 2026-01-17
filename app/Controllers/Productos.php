<?php

namespace App\Controllers;

use App\Models\ProductosModel;

class Productos extends BaseController
{
    public function productos(): string
    {
        $model = model(ProductosModel::class);

        $data = [
            'title' => 'Todos Nuestros Productos',
            'productos' => $model->getProductos(),
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/productos',)
            . view('frontend/templates/footer');
    }
}