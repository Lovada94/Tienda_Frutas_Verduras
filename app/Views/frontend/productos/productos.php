<?php

/** @var array $frutas, $verduras, $envasados, $random */ ?>

<div class="d-flex">

    <!-- SIDEBAR IZQUIERDA -->
    <aside class="flex-shrink-0 bg-body-tertiary border-end p-4 sidebar-left">
        <div class="sticky-side">
            <h3 class="mb-3">Navega</h3>
            <hr>

            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a href="<?= base_url('/') ?>" class="nav-link active" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('productos') ?>" class="nav-link link-body-emphasis" aria-current="page">Productos</a>
                </li>
                <li>
                    <a href="<?= base_url('frutas') ?>" class="nav-link link-body-emphasis">Frutas</a>
                </li>
                <li>
                    <a href="<?= base_url('verduras') ?>" class="nav-link link-body-emphasis">Verduras</a>
                </li>
                <li>
                    <a href="<?= base_url('envasados') ?>" class="nav-link link-body-emphasis">Envasados</a>
                </li>
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
                                // Si el random puede venir de frutas/verduras/envasados con carpetas distintas:
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
                                                <a class="btn btn-sm btn-outline-success" href="<?= base_url('productos/frutas') ?>">
                                                    Ampliar
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                            </div>

                                            <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                                <?= esc($producto['precio']) ?> €
                                            </span>
                                        </div>
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
    <aside class="flex-shrink-0 bg-body-tertiary border-start p-4 sidebar-right">
        <div class="sticky-side">

            <h5 class="mb-3 text-capitalize text-end">Nuestros productos</h5>

            <?php if (!empty($random)): ?>
                <div class="card shadow-sm">
                    <?php
                    // Si el random puede venir de frutas/verduras/envasados con carpetas distintas:
                    $imgPath = 'assets/img/fruta_verdura/' . ($random['imagen'] ?? '');
                    if (!empty($random['tipo']) && $random['tipo'] === 'envasados') {
                        $imgPath = 'assets/img/envasados/' . ($random['imagen'] ?? '');
                    }
                    ?>

                    <img
                        class="card-img-top"
                        src="<?= base_url($imgPath) ?>"
                        alt="<?= esc($random['nombre'] ?? 'Producto') ?>"
                        style="height: 180px; object-fit: cover;">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="me-2">
                                <div class="fw-semibold text-capitalize">
                                    <?= esc($random['nombre'] ?? '-') ?>
                                </div>
                            </div>

                            <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                <?= esc($random['precio'] ?? '-') ?> €
                            </span>
                        </div>

                        <div class="d-grid mt-3">
                            <a class="btn btn-outline-success btn-sm" href="<?= base_url('productos') ?>">
                                Ver <?= esc($random['categoria']) ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-light border mb-0">
                    No hay producto random todavía.
                </div>
            <?php endif; ?>

        </div>
    </aside>

</div>