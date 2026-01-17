<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ProductosModel;

class Productos extends BaseController
{
    public function productos($categoria = null): string
    {
        $model = model(ProductosModel::class);
        $modelCat = model(CategoriasModel::class);

        $categorias = $modelCat->findAll();

        // 1) Leer orden desde query string
        $sort = $this->request->getGet('sort') ?? 'nombre';
        $dir  = strtolower($this->request->getGet('dir') ?? 'asc');

        // 2) Normalizar/validar para evitar inyección
        $allowedSort = ['nombre', 'precio', 'n_ventas'];
        if (!in_array($sort, $allowedSort, true)) $sort = 'nombre';
        if (!in_array($dir, ['asc', 'desc'], true)) $dir = 'asc';

        // 3) Pedir productos con filtro+orden
        $productos = $categoria ?
            $model->getProductosPorCategoria($categoria, $sort, $dir) :
            $model->getProductos($sort, $dir);

        $data = [
            'title'      => $categoria ? ('Productos: ' . $categoria) : 'Todos Nuestros Productos',
            'categorias' => $categorias,
            'productos'  => $productos,
            'categoriaActiva' => $categoria, // para construir links en la vista
            'sort' => $sort,
            'dir'  => $dir,
        ];

        return view('frontend/templates/navbar', $data)
            . view('frontend/productos/productos', $data)
            . view('frontend/templates/footer');
    }
}
