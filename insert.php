<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; //PDO;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection(); //new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES (:nome)');
    $comando->execute([':nome' => $_POST['nome']]);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Document</title>
            </head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
        <main class="container"
        <h1>Novo Gênero</h1>
        <form action="insert.php" method="post">
            <div class=form-group">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" />
            </div>
            <br />
            <button class="btn btn-success" type="submit">Salvar</button>
        </form>
    </body>
</html>