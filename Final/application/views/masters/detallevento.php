<?php
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalles eventos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle.css'); ?>">
</head>
<body>
	<a href="<?php echo base_url('anuncio/agregar'); ?>" class='btn btn-default bg-primary text-white'  id="myBtn">Publicar anuncio</a>
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
              <?php
            $salir = base_url('autorizacion/salir');
            	if($sesion !='popo'){
            		echo "<a class='btn btn-default btn-outline btn-circle collapsed'  data-toggle='collapse' href='{$salir}' aria-expanded='false' aria-controls='nav-collapse2'>Salir</a>";
            	}else{
            		echo "<a class='btn btn-default btn-outline btn-circle collapsed'  data-toggle='collapse' href='#nav-collapse2' aria-expanded='false' aria-controls='nav-collapse2'>Sign in</a>";
            	}
            ?>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" required />
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
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-8 align-self-start">
								<h4 class="card-title"><b><?=$evento->nombre?></b></h4>	
							</div>
							<div class="col align-self-end">
								<h4><?=$evento->fecha?></h4>
							</div>
						</div>
						<div class="col-md-auto">
							<?php $link = base_url(); ?>
							<img class="car-img-top" style="width: 300px; height: 300px;" src="<?=$link.$evento->imagen?>" alt="Card image cap">
							<p><?=$evento->descripcion?></p>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="map"></div>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="openCity(event, 'home')">Autor</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane active" id="home">
				  	<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-auto">
									<img class="car-img-top" style="width: 50px; height: 50px;" src="<?php echo base_url('/img/user.jpg'); ?>" alt="Card image cap">
								</div>
								<div class="col">
									<h5 class="card-title"><b>Agregago por:</b><?php echo $usuario->username;?></h5>
									<p class="card-text">Administrador del sitio.</p>
								</div>
							</DIV>
						</div>											  						  			
					</div>
						
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
	<script>
		// Initialize and add the map
		function initMap() {
		  // The location of Uluru
		  var uluru = {lat: <?php echo $evento->lat; ?>, lng: <?php echo $evento->lng; ?>};
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('map'), {zoom: 15, center: uluru});
		  // The marker, positioned at Uluru

		  var marker = new google.maps.Marker({position: uluru, map: map});
		  var contentString ='<?php echo $evento->nombre;?>';
		  var infowindow = new google.maps.InfoWindow({
		    content: contentString
		  });
		  marker.addListener('click', function() {
		    infowindow.open(map, marker);
		  });
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTLK4Dr5Y-JFeVZ-x0bxIZXvLsPlO1Oig&callback=initMap">
    </script>
</body>
</html>