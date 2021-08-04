<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partial' . DIRECTORY_SEPARATOR . 'beginOfPage.php'; ?>

<form action="/salvar-usuario" method="POST" class="w-50 mx-auto mt-3">
  <div class="mb-3">
    <label for="nomeCompleto" class="form-label">Nome Completo</label>
    <input type="text" name="nomeCompleto" class="form-control">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Nome de usuário</label>
    <input type="text" name="nomeUsuario" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" name="senha" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Criar</button>
</form>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partial' . DIRECTORY_SEPARATOR . 'endOfPage.php'; ?>
