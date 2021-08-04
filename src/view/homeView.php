<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partial' . DIRECTORY_SEPARATOR . 'beginOfPage.php'; ?>

<?php foreach($usuarios as $usuario): ?>
    <div>
        <h5><?=$usuario['nome_usuario']?></h5>
        <p><?=$usuario['email']?></p>
    </div>
<?php endforeach ?>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partial' . DIRECTORY_SEPARATOR . 'endOfPage.php'; ?>
