<?php
require('../conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios ORDER BY birth DESC');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

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
								<a class="nav-link" href="../servicos/index.php">Nossos Servi??os</a>
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

    <center><span><h1>Clientes Cadastrados</h1></span></center>
    <!-- CLIENTES -->

		<h3>Aniversariantes do Dia</h3>	

		<br>

		<div class="aniversariantes-do-dia">			
			<?php foreach($usuarios as $um): ?>

				<?php
					if (date('d', strtotime($um['birth'])) == date('d')) {
						echo '<img class="rounded-circle" class="img-responsive" src="../images/' .$um['photo']. '" alt="Generic placeholder image" width="140" height="140"><br>';
						echo 'Hoje ' . $um['name'] . ' faz Anivers??rio!!! <br><br>';
					}
				?>

			<?php endforeach; ?>
		</div>
		
		<br><br>

		<h3>Aniversariantes do M??s</h3>	
		
		<br>

		<div class="aniversariantes-do-mes">			
			<?php foreach($usuarios as $um): ?>

				<?php
					if ( date('m', strtotime($um['birth'])) == date('m')) {
						echo '<br>';
						echo '<img class="rounded-circle" class="img-responsive" src="../images/' .$um['photo']. '" alt="Generic placeholder image" width="140" height="140"><br>';

						echo $um['name'] . ' ?? desse m??s <br>';
						echo 'Anivers??rio: ' . date('d-m', strtotime($um['birth'])) . '<br>';
				
					}
				?>

			<?php endforeach; ?>
		</div>

		<br><br>

		<h3>Todos os usu??rios</h3>

		<div class="Usuarios_cadastrados">

            <?php foreach($usuarios as $um): ?>

                <div class="row">
                    <div class="col-lg-4">
                        <a href="../usuario?id=<?php echo $um['id'] ?>"><img class="rounded-circle" class="img-responsive" src="../images/<?php echo $um['photo']; ?>" alt="Generic placeholder image" width="140" height="140"></a>
                        <h2>Cliente <?php echo $um['id']; ?></h2>
                        <p><?php echo $um['name'] ?></p>
                        
                    </div>
                </div>
                
            <?php endforeach; ?>

        </div>

	</body>
</html>