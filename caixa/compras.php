<?php
require('../conexao.php');


$user_id = $_POST['user_id'];
$servicos = $_POST['servicos'];
$pagamento = $_POST['pagamento'];

$string = implode(",", $servicos); 

#echo "id: ".$user_id."<br>";
#echo "implodido ".$string."<br>";

$explode = explode(",", $string);

#echo "<br><br> explodido";
#print_r($explode);

#foreach ($explode as $um) {
#    echo "<br><br>";
#    echo "item-> ".$um."<br><br>";
#}

#print_r($explode);

$soValores = [];

for ($i=0; $i < count($explode); $i++) { 
#    echo "<br>item ".$i." ---> ".$explode[$i]."<br>";

    if ($i % 2 == 1) {
#        echo $i." é impar<br>";
        
        array_push($soValores, $explode[$i]);
    }
}

#print_r($soValores);

function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

$valorTotal = array_reduce($soValores, "sum");

#echo "<br>***".$valorTotal."***<br>";

#echo "<br>id: ".$user_id."<br>";
#echo "<br>implodido ".$string."<br>";
#echo "<br>compra: ".$valorTotal."<br>";

if ($valorTotal > $pagamento) {

    echo "<script language='Javascript'>window.location.href='../caixa'; alert('Pagamento Insuficiente!, Você comprou: ".$valorTotal." e pagou: ".$pagamento.", falta: ".$valorTotal - $pagamento."');</script>";

    exit();
}

$sql = 'INSERT INTO compras (user_id, servicos, compra) VALUES (?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);
$stm->bindValue(2, $string);
$stm->bindValue(3, $valorTotal);

$stm->execute();

$sql = 'SELECT * FROM compras WHERE user_id = ?;';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);

$stm->execute();

$historicoCompras = $stm->fetchAll(PDO::FETCH_ASSOC);

#print_r($historicoCompras);

echo "<br><br>Serviços: ".$historicoCompras[count($historicoCompras) -1]['servicos'];
echo "<br><br>Compra: ".$historicoCompras[count($historicoCompras) -1]['compra'];

echo "<br><br>Pagamento: ".$pagamento;
echo "<br><br>Troco: ".$historicoCompras[count($historicoCompras) -1]['compra'] - $pagamento."<br><br>";


?>

<!DOCTYPE html>
<html>
	<head>
		<!-- FONTS DO GOOGLE -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<link rel="icon" href="../images/logo.jpeg">
		<link rel="stylesheet" type="text/css" href="style.css">

		<title>Status Barber Shop</title>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	</head>
	<body>

		<!-- NAVBAR -->
    	<nav class="navbar navbar-light bg-light fixed-top">
      
			<div class="container-fluid">
			
				<img class="rounded-circle" src="images/logo.jpeg" alt="Generic placeholder image" width="80" height="80">
				
				<a class="navbar-brand" href="#">Status Barber Shop</a>
			
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
			
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Barbearia</h5>
						<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
			
					<div class="offcanvas-body">
				
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
						
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="../">Inicio</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="../fotos/index.php">Fotos</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="../servicos/index.php">Nossos Serviços</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="../cadastro/index.html">Cadastro de Cliente</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="../caixa/index.php">Caixa</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="../login/index.html">Login</a>
							</li>
						
						</ul>

						<form class="d-flex">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Pesquisar</button>
						</form>
				
					</div>
			
				</div>
			
			</div>

    	</nav>