<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle.css'); ?>">
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
          <a class="navbar-brand" href="<?php echo base_url();?>">BMX RD</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('anuncio'); ?>">Inicio</a></li>
            <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Categorias
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo base_url('anuncio/listaccesorios'); ?>">Accesorios</a>
		          <a class="dropdown-item" href="<?php echo base_url('anuncio/listbicicletas'); ?>">Bicicletas</a>
		          <a class="dropdown-item" href="<?php echo base_url('anuncio/listcomponentes'); ?>">Componentes</a>
		          <a class="dropdown-item" href="<?php echo base_url('anuncio/listservicios'); ?>">Servicios</a>
		        </div>
		      </li>
             <li><a href="<?php echo base_url('master/nosotros'); ?>">Nosotros</a></li>
            
            <li><a href="<?php echo base_url('master/noticias'); ?>">Noticias</a></li>
            <li><a href="<?php echo base_url('master/eventos');?>">Eventos</a></li>
            <li>
              <a hidden class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
            </li>
            <li>
            	<a class="btn btn-default btn-outline btn-circle collapsed"   href="<?php echo base_url('autorizacion/registro'); ?>" aria-expanded="false" aria-controls="nav-collapse2">Registro</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form method="post" action="<?php echo base_url('autorizacion/login'); ?>" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Email">Usuario</label>
                <input type="text" name="username" class="form-control" id="Email" placeholder="Username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="col card">
					<h4>Inicio de sesion</h4>
					<div class="col-md-4">
						<form method="post" action="<?php echo base_url('autorizacion/login'); ?>">
							<div class="form-group">
								<label>Nombre de usuario</label>
								<input type="text" class="form-control" name="username" required>
							</div>
							<div class="form-group">
								<label>Contrasena</label>
								<input type="password" class="form-control" name="password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Iniciar sesion</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="">
				<div class="row" style="">
					<div class="col card">
						<?php $link=base_url();

						if($primerban[0]->imagen=='')
						{
							echo "{$primerban[0]->codigo}";
						}else{
							echo "<img class='car-img-top' style='padding: 5px;'' src='{$link}mthumb.php?src={$link}{$primerban[0]->imagen}&w=350&h=400&q=100' alt='Card image cap'>";
						}

						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js');?>"></script>
     <script src="<?php echo base_url();?>scritp/myscritp.js"></script>
</body>
</html>