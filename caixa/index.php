<?php
require('../conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios ORDER BY name DESC');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->query('SELECT * FROM servicos ORDER BY name DESC');

$servicos = $sql->fetchAll(PDO::FETCH_ASSOC);

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

    <form action="compras.php" method="post">
        
        <h4>Cliente:</h4>

        <select name="user_id" id="">
            
            <?php foreach($usuarios as $um): ?>

                <option value="<?php echo $um['id'] ?>"><?php echo $um['name'] ?> ---> <?php echo $um['instagram'] ?></option>

            <?php endforeach; ?>

        </select>

        <br><br><br>

        <h4>Serviços:</h4>

        <?php foreach($servicos as $um): ?>

            <div class="row">                

                <div class="col-lg-4">
                    
                    <img class="rounded-circle" class="img-responsive" src="../images/<?php echo $um['photo']; ?>" alt="Generic placeholder image" width="100" height="100">
                    <p style="margin-left: 10px; font-size: 20px;"><?php echo $um['name']; ?> <input name="servicos[]" value="<?php echo $um['name']; ?>,<?php echo $um['price']; ?>" class="form-check-input" type="checkbox" id="inlineFormCheck"></p>
                      
                </div>
                
            </div>

        <?php endforeach; ?>

        <br>
        
        <label for="">Pagamento</label>
        <input type="text" name="pagamento" id="">

        <button type="submit">Finalizar Compra</button>

    </form>
</body>
</html>