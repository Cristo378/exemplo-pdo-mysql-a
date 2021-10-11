<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();
$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);
    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Remover Gênero</title>
    </head>
    <body>
        <main>
            <p>Tem certeza que quer remover o gênero "<?= $genero['nome'] ?>" ?</p>
                <form action="delete.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="<?= $genero['id'] ?>"/>
                    </div>
                    <a class="btn btn-secondary" href="index.php">Voltar</a>
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
        </main>
    </body>
</html>