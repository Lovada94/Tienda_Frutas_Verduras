<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="theme-color" content="#712cf9" />
  <link href="<?= base_url('assets/css/inicio.css') ?>" rel="stylesheet" />

  <title>Final CodeIgniter</title>
  
</head>
<?php $session = session(); ?>
<body>
  <nav
    class="navbar navbar-expand-lg navbar-dark bg-dark"
    aria-label="Eighth navbar example">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(relativePath: '/') ?>"><img class="logo" src="<?= base_url('assets/img/logo.jpg') ?>"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarsExample07"
        aria-controls="navbarsExample07"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample07">
        <div class="container d-flex justify-content-between">
          <div class="buscador">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: '/') ?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'productos') ?>">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'frutas') ?>">Frutas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'verduras') ?>">Verduras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'envasados') ?>">Envasados</a>
              </li>
              <?php if ($session->has('user_id')): ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'backend/admin') ?>">Inicio admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?= base_url(relativePath: 'backend/wonder') ?>">Modificar maravillas</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="login">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php if (!$session->has('user_id')): ?>
                <li class="nav-item">
                  <a class="btn btn-light" href="<?= base_url('login') ?>">Login</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="btn btn-light" href="<?= base_url('session') ?>">Cerrar sesión</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>