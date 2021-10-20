<?php
require('../conexao.php');

$servicosFull = $pdo->query('SELECT * FROM servicos');

$servicos = $servicosFull->fetchAll(PDO::FETCH_ASSOC);




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

		<br><br><br><br>

		<!-- JUMBOTRON -->
		<div class="jumbotron jumbotron-fluid">
		  	<div class="container">
				<h1 class="display-4"> Status BarberShop <a href="cadastrar.html"><h3>--------------------------------------------------------------------> Cadastrar um Serviço+</h3></a></h1>

				<?php foreach($servicos as $um): ?>

					<!-- CARDS -->
					<div class="row row-cols-1 row-cols-md-3 g-4">
					
						<div class="col">
							
							<div class="card h-100">
						
								<!-- EFEITO ZOOM -->	
								<div class="zoom2">
									<img src="../images/<?php echo $um['photo']; ?>" class="card-img-top" alt="..." class="img-responsive">
								</div>
								
								<div class="card-body">
									<h5 class="card-title"><?php echo $um['name']; ?></h5>
									<p class="card-text">Valor do Corte $<?php echo $um['price'] ?>,00</p>
								</div>
							
								<div class="card-footer">
									<small class="text-muted">Atualizado há 3 dias</small>
							
									<!-- BOTÂO COM HOVER -->
									<div class="btn">
										<a href="#"><span>Agendar</span></a>
									</div>
								
								</div>
							
							</div>
						
						</div>
					
					</div>

					<br>

				<?php endforeach; ?>
					
			</div>
					
		</div>

		<center><footer>
        	<h2>Siga-nos</h2>
        	<aside>

        		<img class="rounded-circle" src="images/logo.jpeg" alt="Generic placeholder image" width="80" height="80">

            	<a href="" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAz0lEQVRIieWV2xHCIBBFTymWYgemBDqRDkwH0ol2kHQAJaSD+AMzEYEFYn70zuwPc7lneQzAP2gA7sAErL4mP3bZG2w3obmy3tuksSI4rtuR4aFGKXwQAhyf26EjT3G7XCF8AU6JOTHA9nZvIv8ZuAKPhDe5CiMA9I5mAJgbAFrwTimAdENaAGsLQNKzdp7rBCyJOXPKaDoB1YesMuaeM1C5btwXAK603NL9rgWIL2vusasBiI9dkOkAmNrwoIH3M8kBHB0fzlbKd6eEsR/VCyCr8p3FP6oZAAAAAElFTkSuQmCC"  alt="Generic placeholder image" width="20" height="20"></a>

            	<a href="" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA3klEQVRIie2U2w2DMAxFzwiMwggZoSMwQjcoG5QN6g3oJnQDsgFsQH8cKULBhNcflq6E7Pge5yHgjp3hgA/QA9OKel3rcs2rDNMlVTmT7zUPMnciG81GoATqKCcWwBtmAjxVYZBO+x7Rut4CpIx/OuU8Sq11wDDr2QQogQJ4q9Gg34XWUj3ZANF8k6g1WpMjgFrzY6IWzrq+CuDPAIhhEuDfI4BwyQHiVcH88CWHs156pvPnuQrwCw0T0AIvVWus8xZAjMZciQVwJwCcBYCLf9fxTgT7TuIzl5zJ70jGH6oXAMkBg7n+AAAAAElFTkSuQmCC" alt="Generic placeholder image" width="20" height="20"></a>
           
        	</aside>
        	<p>Status_Barber_Shop</p>
        	<p>&copy; Desenvolvido por JedaSistemas - 2021</p>
    	</footer></center>


<!-- <footer class="container">
        <p class="float-right"><a href="#">Voltar ao Topo</a></p>
        <p>&copy; 2020-2021 Davi-Nascimento, Inc. &middot; <a href="#">Segurança</a> &middot; <a href="#">Termos</a></p>
         
      </footer>
    </main> -->

	</body>

	
</html>