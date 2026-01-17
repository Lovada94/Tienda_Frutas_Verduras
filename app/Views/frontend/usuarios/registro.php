<main class="form-signin w-100 m-auto">
    <form method="post" action="<?= base_url('registro') ?>">

        <?= csrf_field() ?>

        <h1 class="h3 mb-3 fw-normal"><?= esc($title) ?></h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $e): ?>
                        <li><?= esc($e) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-floating">
            <input
                type="text"
                class="form-control"
                id="nombre"
                placeholder="Nombre"
                name="nombre"
                value="<?= esc(set_value('nombre')) ?>" />
            <label for="floatingInput">Nombre</label>
        </div>

        <div class="form-floating">
            <input
                type="text"
                class="form-control"
                id="apellidos"
                placeholder="Apellidos"
                name="apellidos"
                value="<?= esc(set_value('apellidos')) ?>" />
            <label for="floatingInput">Apellidos</label>
        </div>

        <div class="form-floating">
            <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Email"
                name="email"
                value="<?= esc(set_value('email')) ?>" />
            <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating">
            <input
                type="text"
                class="form-control"
                id="username"
                placeholder="Nombre de usuario"
                name="username"
                value="<?= esc(set_value('username')) ?>" />
            <label for="floatingInput">Nombre de usuario</label>
        </div>

        <div class="form-floating">
            <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Password"
                name="password"
                value="<?= esc(set_value('password')) ?>" />
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">
            Regístrate
        </button>
    </form>
</main>