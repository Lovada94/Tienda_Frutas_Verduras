<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Productos extends BaseController
{
    public function productos($categoria = null): string
    {
        $model = model(ProductosModel::class);
        $model_cat = model(CategoriasModel::class);

        
        $categorias = $model_cat->findAll();
        

        if ($categoria == null) {
            $data = [
                'title' => 'Todos Nuestros Productos',
                'productos' => $model->getProductos(),
                'categorias' => $categorias,
            ];
            return view('frontend/templates/navbar', $data)
                . view('frontend/productos/productos',)
                . view('frontend/templates/footer');
        } else {
            $data = [
                'title' => 'Todos Nuestros Productos',
                'productos' => $model->getProductosPorCategoria($categoria),
                'categorias' => $categorias,
            ];
            return view('frontend/templates/navbar', $data)
            . view('frontend/productos/productos',)
            . view('frontend/templates/footer');
        }
    }
}
