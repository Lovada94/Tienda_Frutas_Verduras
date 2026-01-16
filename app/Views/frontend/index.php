<div class="container my-3">
    <div class="row my-4">
        <div class="col-md-7 order-md-2 d-flex flex-column justify-content-center">
            <h1 class="fw-normal lh-1 text-center m-3">Bienvendio a BioEssencia</h1>
            <p class="lead">Disfruta del mejor catálogo de productos ecológicos. Frutas y verduras frescas como recién cogidas
                y los mejores productos envasados. Todo bajo el sello ecológico autentificador de la Unión Europea</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded border border-dark"
                height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" src="<?= base_url('assets/img/logo_index.png') ?>">
            </img>
        </div>
    </div>
    <section class="py-3">
        <h1 class="text-center my-3 text-capitalize">Frutas más populares!!</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?php foreach ($frutas as $fruta): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= base_url('assets/img/fruta_verdura/' . $fruta['imagen']) ?>"
                            alt="<?= $fruta['nombre'] ?>"
                            height="225" width="100%" class="bd-placeholder-img card-img-top">
                        <h3 class="card-body">
                            <div class="card-title text-center p-3 text-capitalize"><?= $fruta['nombre'] ?></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-success">Ver <?= $fruta['categoria'] ?></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                </div>
                                <small class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill"><?= $fruta['precio'] ?> €</small>
                            </div>
                        </h3>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="py-3">
        <h1 class="text-center my-3 text-capitalize">Verduras más populares!!</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?php foreach ($verduras as $verdura): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= base_url('assets/img/fruta_verdura/' . $verdura['imagen']) ?>"
                            alt="<?= $verdura['nombre'] ?>"
                            height="225" width="100%" class="bd-placeholder-img card-img-top">
                        <div class="card-body">
                            <h3 class="card-title text-center p-3 text-capitalize"><?= $verdura['nombre'] ?></h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-success">Ver <?= $verdura['categoria'] ?></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                </div>
                                <small class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill"><?= $verdura['precio'] ?> €</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="py-3">
        <h1 class="text-center my-3 text-capitalize">Productos envasados más populares!!</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?php foreach ($envasados as $envasado): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= base_url('assets/img/envasados/' . $envasado['imagen']) ?>"
                            alt="<?= $envasado['nombre'] ?>"
                            height="225" width="100%" class="bd-placeholder-img card-img-top">
                        <div class="card-body">
                            <h3 class="card-title text-center p-3 text-capitalize"><?= $envasado['nombre'] ?></h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-success">Ver <?= $envasado['categoria'] ?></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                </div>
                                <small class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill"><?= $envasado['precio'] ?> €</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>


    
</div>
