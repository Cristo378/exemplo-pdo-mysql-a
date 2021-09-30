<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; //PDO;

$bd = new MySQLConnection(); // new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
    </head>
    <body>
        <main class="container">
        <a class="btn btn-primary" href='insert.php'>Novo Gênero</a>
                <table class "table">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach($generos as $g): ?>
                        <tr>
                            <td><?= $g['id'] ?></td>
                            <td><?= $g['nome'] ?></td>
                            <td>
                                <a class="btn btn-segundary" href="update.php?id=<?= $g['id'] ?>">Editar</a> | 
                                <a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </main>
    </body>
</html>