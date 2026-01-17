<div class="d-flex">

    <!-- SIDEBAR IZQUIERDA -->
    <aside class="flex-shrink-0 bg-body-tertiary border-end p-4 sidebar-left">
        <div class="sticky-side">
            <h3 class="mb-3">Filtra</h3>
            <hr>

            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="<?= base_url('productos/') ?>" class="nav-link link-body-emphasis" aria-current="page">Todos los Productos</a>
                </li>
                <?php if ($categorias !== []): ?>
                    <?php foreach ($categorias as $categoria_item): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('productos/' . $categoria_item['categoria']) ?>" class="nav-link link-body-emphasis" aria-current="page"><?= $categoria_item['categoria'] ?></a>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
        </div>
    </aside>

    <!-- CONTENIDO -->
    <main class="flex-grow-1 main-with-sidebars">
        <div class="container my-4">
            <section class="py-4">
                <h2 class="text-center mb-4 text-capitalize"><?= esc($title) ?></h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                    <?php foreach ($productos as $producto): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <?php
                                // ID unico para el modal
                                $modalId = 'modalProducto_' . ($producto['tipo'] ?? 'x') . '_' . ($producto['id_producto'] ?? uniqid());

                                $imgPath = 'assets/img/fruta_verdura/' . ($producto['imagen'] ?? '');
                                if (!empty($producto['tipo']) && $producto['tipo'] === 'envasados') {
                                    $imgPath = 'assets/img/envasados/' . ($producto['imagen'] ?? '');
                                }
                                ?>

                                <img
                                    class="card-img-top"
                                    src="<?= base_url($imgPath) ?>"
                                    alt="<?= esc($producto['nombre'] ?? 'Producto') ?>"
                                    style="height: 250px; object-fit: cover;">

                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title text-center text-capitalize mb-3">
                                        <?= esc($producto['nombre']) ?>
                                    </h4>
                                    <div class="card-footer">
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#<?= esc($modalId) ?>"">
                                                    Ampliar
                                                </button>
                                                <button type=" button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                            </div>

                                            <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                                <?= esc($producto['precio']) ?> €
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="<?= esc($modalId) ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered aling-items-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-center" id="<?= esc($modalId) ?>"><?= esc($producto['nombre'] ?? 'Producto') ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class="col-6">
                                                <img
                                                    class="img-fluid rounded shadow-sm"
                                                    src="<?= base_url($imgPath) ?>"
                                                    alt="<?= esc($producto['nombre'] ?? 'Producto') ?>"
                                                    style="height: 250px; object-fit: cover;">
                                            </div>
                                            <div class="col-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Categoria: <?= esc($producto['categoria']) ?></li>
                                                    <li class="list-group-item">Precio: <?= esc($producto['precio']) ?> €</li>
                                                    <li class="list-group-item">Nº de ventas: <?= esc($producto['n_ventas']) ?></li>
                                                    <li class="list-group-item">Fecha adquisición: <?= esc($producto['fecha_adq']) ?></li>
                                                    <li class="list-group-item">Fecha caducidad: <?= esc($producto['fecha_cad'] ?? 'Producto fresco') ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-secondary">Comprar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section
                </div>
    </main>

    <!-- SIDEBAR DERECHA -->
    <?php
    $base = $categoriaActiva ? base_url('productos/' . $categoriaActiva) : base_url('productos');
    ?>
    <aside class="flex-shrink-0 bg-body-tertiary border-start p-4 sidebar-right">
        <div class="sticky-side">
            <h3 class="mb-3">Ordena</h3>
            <hr>
            <ul class="nav nav-pills flex-column gap-2">
                <li><a href="<?= $base ?>?sort=nombre&dir=asc" class="nav-link link-body-emphasis">Nombre</a></li>
                <li><a href="<?= $base ?>?sort=precio&dir=asc" class="nav-link link-body-emphasis">Precio Ascendente</a></li>
                <li><a href="<?= $base ?>?sort=precio&dir=desc" class="nav-link link-body-emphasis">Precio Descendente</a></li>
                <li><a href="<?= $base ?>?sort=n_ventas&dir=desc" class="nav-link link-body-emphasis">Nº de Ventas</a></li>
            </ul>
        </div>
    </aside>

</div>