<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar</title>
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
                <label class="sr-only" for="Email">Usuario</label>
                <input type="text" name="username" class="form-control" id="Email" name="username" placeholder="Username" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" name="password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	</div>
	<div class="container card">
		<div class="row">
			<div class="col">
				<h6>Seleccione categoria</h6>	
			</div>
			<div class="col">
				<h6>Detalles</h6>	
			</div>
			<div class="col">
				<h6>Gracias</h6>	
			</div>
		</div>
		<div class="progress" style="height: 5px;">
		  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100"></div>
		</div>
		<h4>Agregar anuncio</h4>
		<div class="row">
			<div class="col-1" style="background-color: ;">
			</div>
			<div class="col" style="padding: 20px;">
				<h6>Cada anuncio tendra una vigencia de 45 dias</h6>
				<div class="col-md-8">
				<form method="post" action="<?php echo base_url('anuncio/cargar'); ?>">
						<div class="form-group">
							<label>Seleccione una categoria</label>
							<select class="form-control categoria" name="categoria">
								<option value="0">Seleccione uno</option>
								<option value="ac">Accesorios</option>
								<option value="bc">Bicicletas</option>
								<option value="cm">Componentes</option>
								<option value="cv">Servicios</option>
							</select>
						</div>
						<div class="form-group bici" style="display: none;">
							<label>Seleccione una bicicleta</label>
							<select class="form-control bicicleta" name="bicicleta">
								<option value="0">Seleccione algo</option>
								<option value="Chopper">Chopper</option>
								<option value="Estacionaria">Estacionaria</option>
								<option value="Mountain Bike (MTB)">Mountain Bike (MTB)</option>
								<option value="Mujeres">Mujeres</option>
								<option value="Mujeres">Niños</option>
								<option value="Recumbente">Recumbente</option>
								<option value="Ruta">Ruta</option>
								<option value="Urbana">Urbana</option>
							</select>
						</div>
						<div class="form-group acceso" style="display: none;">
							<label>Seleccione un accesorio</label>
							<select class="form-control accesorio" name="accesorio">
								<option value="0">Seleccione algo</option>
								<option value="Bombas de aire<">Bombas de aire</option>
								<option value="Bultos">Bultos</option>
								<option value="Burros">Burros</option>
								<option value="Cámaras">Cámaras</option>
								<option value="Cascos">Cascos</option>
								<option value="Chapas / Cleats">Chapas / Cleats</option>
								<option value="Computadoras">Computadoras</option>
								<option value="DVDs/Libros">DVDs/Libros</option>
								<option value="Guantillas">Guantillas</option>
								<option value="Herramientas">Herramientas</option>
								<option value="Hidratación">Hidratación</option>
								<option value="Iluminación">Iluminación</option>
								<option value="Lentes">Lentes</option>
								<option value="Limpieza/Lubricación">Limpieza/Lubricación</option>
								<option value="Nutrición">Nutrición</option>
								<option value="Otros">Otros</option>
								<option value="Primeros Auxilios<">Primeros Auxilios</option>
								<option value="Protección">Protección</option>
								<option value="Relojes">Relojes</option>
								<option value="Ropa">Ropa</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Termos/Termeras">Termos/Termeras</option>
								<option value="Transporte/Racks">Transporte/Racks</option>
								<option value="Zapatos">Zapatos</option>
							</select>
						</div>
						<div class="form-group servi" style="display: none;">
							<label>Seleccione un servicio</label>
							<select class="form-control servicio" name="servicio">
								<option value="0">Seleccione algo</option>
								<option value="Clases">Clases</option>
								<option value="Eventos">Eventos</option>
								<option value="Excursiones">Excursiones</option>
								<option value="Fitting">Fitting</option>
								<option value="Fotografia y video">Fotografia y video</option>
								<option value="Mantenimiento">Mantenimiento</option>
								<option value="Personalización">Personalización</option>
								<option value="Reparación">Reparación</option>
								<option value="Varios">Varios</option>
							</select>
						</div>
						<div class="form-group compo" style="display: none;">
							<label>Seleccione un componente</label>
							<select class="form-control componente" name="componente">
								<option value="0">Seleccione algo</option>
									<option value="Agujas / Skewers">Agujas / Skewers</option>
									<option value="Aros">Aros</option>
									<option value="Bandas de freno<">Bandas de freno</option>
									<option value="Bielas / Crankset">Bielas / Crankset</option>
									<option value="Cables">Cables</option>
									<option value="Cadenas">Cadenas</option>
									<option value="Calipers">Calipers</option>
									<option value="Cambiadores / Shifters">Cambiadores / Shifters</option>
									<option value="Carreteles / Hubs">Carreteles / Hubs</option>
									<option value="Cuadros / Frames">Cuadros / Frames</option>
									<option value="Cuernos / Bar ends">Cuernos / Bar ends</option>
									<option value="Descarriladores">Descarriladores</option>
									<option value="Ejes de centro">Ejes de centro</option>
									<option value="Espigas">Espigas</option>
									<option value="Frenos">Frenos</option>
									<option value="Gomas">Gomas</option>
									<option value="Manecillas / Brake levers">Manecillas / Brake levers</option>
									<option value="Otros">Otros</option>
									<option value="Pedales">Pedales</option>
									<option value="Piñones">Piñones</option>
									<option value="Rayos / Spoke">Rayos / Spokes</option>
									<option value="Rotores">Rotores</option>
									<option value="Sillines">Sillines</option>
									<option value="Suspensiones">Suspensiones</option>
									<option value="Tasas / Headsets">Tasas / Headsets</option>
									<option value="Tenedores">Tenedores</option>
									<option value="Tijas">Tijas</option>
									<option value="Timones">Timones</option>
									<option value="Tubos">Tubos</option>
									<option value="Varios">Varios</option>
							</select>
						</div>
						<div class="form-group sigui" style="display: none;">
							<button class="btn btn-primary" type="submit">Siguiente</button>
						</div>

					</form>
				</div>
			</div>
			<div class="col-1" style="background-color: ;">
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url();?>scritp/myscritp.js"></script>
</body>
</html>