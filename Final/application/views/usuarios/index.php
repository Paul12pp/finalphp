<?php
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar perfil</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle2.css'); ?>">
	<style type="text/css">
		a:link{
			text-decoration: none;
		}
		a{
			color: black;
		}
	</style>
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
            <li><a href="<?php echo base_url();?>">Inicio</a></li>
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
            <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Nosotros
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Quienes somos</a>
		          <a class="dropdown-item" href="#">Contacto</a>
		        </div>
		      </li>
            <li><a href="<?php echo base_url('master/noticias'); ?>">Noticias</a></li>
            <li><a href="<?php echo base_url('master/eventos');?>">Eventos</a></li>
             <li <?php echo $admin;?> class="nav-item dropdown">
		          <?php 
		          $super = base_url('master');
		          $editar = base_url('usuario');
		          $ads = base_url('anuncio/panel');
		          if($sesion !='popo'){
				          	echo "<a href='#' class='btn tito nav-link dropdown-toggle' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='setting' data-toggle='tooltip' data-placement='top' title='Panel de control'></span></a>
				        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          <a class='dropdown-item' href='{$ads}'>Mis anuncios</a>
				          <a class='dropdown-item' href='{$editar}'>Editar perfil</a>";

		          	if($admin !='hidden' && $admin !='0')
		          	{
		          		echo "<a class='dropdown-item' href='{$super}'>Administrador</a>";
		          	}
		          	else{
		          		echo "";
		          	}
		          }else{
		          	echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
		          }
		          ?>
		        </div>
		      </li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="<?php echo base_url('autorizacion/salir'); ?>" aria-expanded="false" aria-controls="nav-collapse2">Salir</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form method="post" action="<?php echo base_url('autorizacion/login'); ?>" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Usuario">Usuario</label>
                <input type="text" class="form-control" id="Usuario" placeholder="Usuario" name="username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required />
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
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="openCity(event, 'home')">Mi perfil</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane active" id="home">
				  		<div class="card">
				  			<div class="col-md-12">
				  				<p>
				  					En esta sesion puedes editar toda la informacion referente a tu perfil,
				  					teniendo en cuenta que el nombre de usuario no se puede cambiar una vez
				  					registrado en la pagina.
				  				</p>
				  			</div>
				  			<div class="col-md-6">
				  				<form method="post" action="<?php echo base_url('usuario/actualizarPerfil');?>">
				  					<div class="form-group">
				  						<input hidden type="text" class="form-control" value="<?=$usuario->id?>" name="id" readonly>
				  					</div>
				  					<div class="form-group">
				  						<label>Nombre de usuario</label>
				  						<input type="text" class="form-control" value="<?=$usuario->username?>" name="username" readonly>
				  					</div>
				  					<div class="form-group">
				  						<input hidden type="text" class="form-control" value="<?=$usuario->password?>" name="password" readonly>
				  					</div>
				  					<div class="form-group">
				  						<label>Nombre</label>
				  						<input type="text" class="form-control" value="<?=$usuario->nombre?>" name="nombre">
				  					</div>
				  					<div class="form-group">
				  						<label>Apellido</label>
				  						<input type="text" class="form-control" value="<?=$usuario->apellido?>" name="apellido">
				  					</div>
				  					<div class="form-group">
				  						<label>Correo</label>
				  						<input type="text" class="form-control" value="<?=$usuario->correo?>" name="correo">
				  					</div>
				  					<div class="form-group">
				  						<label>Acerca de mi</label>
				  						<textarea class="form-control" name="acerca"><?=$usuario->acerca?></textarea>
				  					</div>
				  					<div class="form-group">
				  						<input hidden class="form-control" type="text" value="<?=$usuario->fechareg?>" name="fechareg">
				  					</div>
				  					<div class="form-group">
				  						<button class="btn btn-success" type="submit">Actualizar</button>
				  					</div>
				  				</form>
				  			</div>
				  		</div>				  	
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row" style="padding: 5px;">
					<div class="col card">
						<h3>Informacion de la cuenta</h3>
						<div class="card-body">
							<div class="row">
								<div class="col-md-auto">
									<?php $link=base_url(); ?>
									<img class="car-img-top" src="<?=$link.'mthumb.php?src='.$link.'img/user.jpg'.'&w=75&h=100'?>" alt="Card image cap">
								</div>
								<div class="col">
									<h5 class="card-title"><b><?php echo $usuario->username;?></b></h5>
									<h5 class="card-title"><b>Mienbro desde:</b><?=$usuario->fechareg?></h5>
								</div>
							</DIV>
							<div class="row">
								<div class="col">
									<hr>
									<h5 class="card-title"><b><?=$usuario->correo?></b></h5>
								</div>
							</div>
						</div>				
					</div>
				</div>
				<div class="row" style="padding: 5px;">
					<div class="col card">
						<img class="car-img-top" style="padding: 5px;" src="<?=$link.'mthumb.php?src='.$link.'img/graph.png'.'&w=350&h=200'?>" alt="Card image cap">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url();?>scritp/myscritp.js"></script>
</body>
</html>
