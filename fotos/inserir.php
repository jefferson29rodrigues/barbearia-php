<?php
require('../conexao.php');

$photo = $_FILES['photo'];

$nomePhoto = $_FILES['photo']['name'];
$caminhoAtual = $_FILES['photo']['tmp_name'];
$caminhoSalvar = '../images/'.$nomePhoto;

move_uploaded_file($caminhoAtual, $caminhoSalvar);

$name = $_POST['name'];
$description = $_POST['description'];
$date = $_POST['date'];
$terms = $_POST['terms'];

$sql = 'INSERT INTO fotos (photo, name, description, date, terms) VALUES (?, ?, ?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $nomePhoto);
$stm->bindValue(2, $name);
$stm->bindValue(3, $description);
$stm->bindValue(4, $date);
$stm->bindValue(5, $terms);

$stm->execute();

header("location: index.php");

?>