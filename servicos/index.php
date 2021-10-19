<?php
require('../conexao.php');

$servicosFull = $pdo->query('SELECT * FROM servicos');

$servicos = $servicosFull->fetchAll(PDO::FETCH_ASSOC);

print_r($servicos);



?>