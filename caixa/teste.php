<?php
require('../conexao.php');

$sql = $pdo->query('SELECT name, instagram, compra, user_id FROM usuarios LEFT JOIN compras ON usuarios.id = compras.user_id ;');

$join = $sql->fetchAll(PDO::FETCH_ASSOC);

/*
SELECT column_name(s)
FROM table1
LEFT JOIN table2
ON table1.column_name = table2.column_name;
*/

#print_r($join);
#echo "<br><br>";


$name = "";
$names = [];

for ($i=0; $i < count($join); $i++) { 
    
    $loops = 0;
    $somaCompras = 0;
    
    if ($name != $join[$i]['name']) {
        
        #veja se $join[$i]['name'] já está no $names
        
        $existe = 0;
        $noexiste = 0;

        for ($k=0; $k < count($names); $k++) { 
            
            if ($join[$i]['name'] == $names[$k]) {

                $existe++;
            }
            
            if($join[$i]['name'] != $names[$k]) {

                $noexiste++;
            }

        }
        
        #se não estiver faça:

        for ($j=0; $j < count($join); $j++) {
    
            if ($existe <= 0 && $join[$j]['name'] == $join[$i]['name']) {
            
                #echo "<br>".$join[$j]['name']." comprou ".$join[$j]['compra']."<br>";
        
                $somaCompras = $somaCompras + $join[$j]['compra'];
                #echo "<br>".$somaCompras."<br>";
            }
        
            $loops++;        
        }

    }

    #echo "<br>Quantidade de  loops ".$loops."<br>";
    #echo "<br> Terminada volta ".$i." com a compra no total de ".$somaCompras." para ".$join[$i]['name']." com id: ".$join[$i]['user_id']."<br>";
    
    if ($somaCompras != 0) {

        #echo "<br> Terminada volta ".$i." com a compra no total de ".$somaCompras." para ".$join[$i]['name']." com id: ".$join[$i]['user_id']."<br>";
        echo "<br>Cliente ".$join[$i]['name']." - ".$join[$i]['instagram']." está com o total de ".$somaCompras." em compras!<br>";
        echo "<br> ------------------------------------------------------------------------------------------------------ <br>";
    }

    
    $name = $join[$i]['name'];
    #echo "<br>".$name."<br>";
    
    array_push($names, $name);
    #echo "<br>".print_r($names)."<br>";
    #echo "<br>existe ".$existe."<br>";
    #echo "<br>noexiste ".$noexiste."<br>";
    #echo "<br> ------------------------------------------------------------------------------------------------------ <br>";

}



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
    
</body>
</html>

