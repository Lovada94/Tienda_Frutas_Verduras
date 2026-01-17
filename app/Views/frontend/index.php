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
                    <a href="<?= base_url('productos') ?>" class="nav-link link-body-emphasis">Productos</a>
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

            <!-- HERO -->
            <div class="row align-items-center gy-4 mb-5">
                <div class="col-md-5 text-center text-md-start">
                    <img
                        class="img-fluid rounded border border-dark"
                        src="<?= base_url('assets/img/logo_index.png') ?>"
                        alt="BioEssencia"
                        style="max-width: 500px; width: 100%;">
                </div>

                <div class="col-md-7">
                    <h1 class="fw-normal lh-1 text-center text-md-start mb-3">
                        Bienvenido a BioEssencia
                    </h1>
                    <p class="lead">
                        Disfruta del mejor catálogo de productos ecológicos. Frutas y verduras frescas como recién cogidas
                        y los mejores productos envasados. Todo bajo el sello ecológico autentificador de la Unión Europea.
                    </p>
                    <a class="btn btn-success btn-lg btn-block" href="/">Ver Productos</a>
                </div>

            </div>

            <!-- FRUTAS -->
            <section class="py-4">
                <h2 class="text-center mb-4 text-capitalize">Frutas más populares!!</h2>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <?php foreach ($frutas as $fruta): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img
                                    src="<?= base_url('assets/img/fruta_verdura/' . $fruta['imagen']) ?>"
                                    alt="<?= esc($fruta['nombre']) ?>"
                                    class="card-img-top"
                                    style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center text-capitalize mb-3">
                                        <?= esc($fruta['nombre']) ?>
                                    </h5>

                                    <div class="card-footer">
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-success" href="<?= base_url('productos/frutas') ?>">
                                                Ver <?= esc($fruta['categoria'] ?? 'Frutas') ?>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                        </div>

                                        <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                            <?= esc($fruta['precio']) ?> €
                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>

            <hr class="my-5">

            <!-- VERDURAS -->
            <section class="py-4">
                <h2 class="text-center mb-4 text-capitalize">Verduras más populares!!</h2>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <?php foreach ($verduras as $verdura): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img
                                    src="<?= base_url('assets/img/fruta_verdura/' . $verdura['imagen']) ?>"
                                    alt="<?= esc($verdura['nombre']) ?>"
                                    class="card-img-top"
                                    style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center text-capitalize mb-3">
                                        <?= esc($verdura['nombre']) ?>
                                    </h5>

                                    <div class="card-footer">
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-success" href="<?= base_url('productos/verduras') ?>">
                                                Ver <?= esc($verdura['categoria'] ?? 'Verduras') ?>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                        </div>

                                        <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                            <?= esc($verdura['precio']) ?> €
                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>

            <hr class="my-5">

            <!-- ENVASADOS -->
            <section class="py-4">
                <h2 class="text-center mb-4 text-capitalize">Productos envasados más populares!!</h2>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <?php foreach ($envasados as $envasado): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img
                                    src="<?= base_url('assets/img/envasados/' . $envasado['imagen']) ?>"
                                    alt="<?= esc($envasado['nombre']) ?>"
                                    class="card-img-top"
                                    style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center text-capitalize mb-3">
                                        <?= esc($envasado['nombre']) ?>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-success" href="<?= base_url('productos/envasados') ?>">
                                                Ver <?= esc($envasado['categoria'] ?? 'Envasados') ?>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                        </div>

                                        <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                            <?= esc($envasado['precio']) ?> €
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>

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