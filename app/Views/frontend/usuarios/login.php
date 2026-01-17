<main class="form-signin w-100 m-auto d-flex aling-items-center justify-content-center">
  <form method="post" action="<?= base_url('login') ?>">

    <?= csrf_field() ?>

    <h1 class="h3 mb-3 fw-normal"><?= esc($title) ?></h1>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert">
        <?= esc($error) ?>
      </div>
    <?php endif; ?>

    <div class="form-floating">
      <input
        type="text"
        class="form-control"
        id="floatingInput"
        placeholder="Nombre de usuario"
        name="username"
        value="<?= esc(set_value('username')) ?>" />
      <label for="floatingInput">Usuario</label>
    </div>
        
    <div class="form-floating">
      <input
        type="password"
        class="form-control"
        id="floatingPassword"
        placeholder="Password"
        name="password"
        value="<?= esc(set_value('password')) ?>" />
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">
      Sign in
    </button>
  </form>
</main>