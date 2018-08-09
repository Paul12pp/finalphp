<?php
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar anuncio</title>
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
           <form action="<?php echo base_url('autorizacion/login'); ?>" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" autofocus required />
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
				<div class="card">
					<div class="row">
						<div class="col-1" style="background-color: ;">
						</div>
						<div class="col-md-8" style="background-color: ;">
							<h5>Llene los campos y pulse el boton de actualizar.</h5>
							<form method="post" action="<?php echo base_url('anuncio/guardarBici'); ?>" enctype="multipart/form-data">
								<div class="form-group">
									<input hidden readonly class="form-control" type="text" value="<?=$bicicleta->id?>" name="id">
								</div>
								<div class="form-group">
									<label>Provincia (*)</label>
									<select class="form-control provincia" name="provincia" required="">
										<option value="">- Seleccione -</option>
										<?php 
											$option = array('Distrito Nacional','Azua','Bahoruco','Dajabón','Duarte','El Seibo','Elías Piña','Espaillat','Hato Mayor','Hermanas Mirabal','Independencia', 'La Altagracia','La Romana','La Vega','María Trinidad',' Monseñor Nouel (Bonao)','Monte Cristi','Monte Plata','Pedernales','Peravia','Puerto Plata','Samaná','San Cristóbal','San José de Ocoa','San Juan','San Pedro de Macorís','Sánchez Ramírez','Santiago Rodríguez','Valverde Mao');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->provincia==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Tel./cel (*)</label>
									<input class="form-control" type="text" value="<?=$bicicleta->telefono?>" name="telefono" required>
								</div>
								<div class="form-group">
									<label>Tipo (*)</label>
									<select class="form-control bicicleta" name="tipo" required="">
										<option value="">- Seleccione -</option>
										<?php 
											$option = array('Chopper','Estacionaria','Mountain Bike (MTB)','Mujeres','Recumbente','Ruta','Urbana');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->tipo==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Marca(*)</label>
									<select class="form-control" name="marca" required="">
										<option value="">- Seleccione -</option>
										<?php 
											$option = array('BH','Bianchi','BMC','Cannondale','Carolina',
												'Cervelo','Colnago','Cube','Cyfac','Diamondback','Eagle','Ellsworth','Felt','Fuji','Gary Fisher','Giant','GT','Hasa','Hoffman','Huffy','Hussar','Iron Horse', 'Jamis','Julen','Klein','Kona','KTM','Lapierre','LeMond','Litespeed','Look','Marin','Merida','Mongoose','Montecci',',Motobecane','Niner','Peugeot','Pilot','Pinarello','Raleigh','Ridley','Salsa','Santa Cruz','Scapin','Schwinn','Scott','Specialized','Trek','Wilier','Yeti','Otras');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->marca==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Modelo</label>
									<input class="form-control" value="<?=$bicicleta->modelo?>" type="text" name="modelo">
								</div>
								<div class="form-group">
									<label>Tamano aro (*)</label>
									<select class="form-control" name="tmaro" required="">
										<option value="">- Seleccione -</option>\
										<?php 
											$option = array('12 pulgadas','16 pulgadas','20 pulgadas','24 pulgadas','26 pulgadas','29 pulgadas','700c', 'Otro');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->tmaro==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Tamano cuadro (*)</label>
									<select class="form-control" name="tmcuadro" required="">
										<option value="">- Seleccione -</option>
										<?php 
											$option = array('Desconocido','Niños','XS','S','M','L','XL','XXL');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->tmcuadro==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
										
									</select>
								</div>
								<div class="form-group">
									<label>Accion (*)</label>
									<select class="form-control" name="accion" required="">
										<option value="">- Seleccione -</option>
										<?php 
											$option = array('Vender','Comprar','Alquilar');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->accion==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Moneda</label>
									<select class="form-control" name="moneda">
										<option value="0">- Seleccione -</option>
										<?php 
											$option = array('$','USD$');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($bicicleta->moneda==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Precio (*)</label>
									<input class="form-control" value="<?=$bicicleta->precio?>" type="text" name="precio" required>
								</div>
								<div class="form-group">
									<label>Titulo del anuncio (*)</label>
									<input class="form-control" type="text" value="<?=$bicicleta->titulo?>" name="titulo" required>
								</div>
								<div class="form-group">
									<label>Descripcion (*)</label>
									<textarea class="form-control" name="descripcion" required><?=$bicicleta->descripcion?></textarea>
								</div>
								<div class="custom-file">
									<input class="custom-file-input" type="file" name="imagen" required>
									<label class="custom-file-label">Imagen</label>
								</div>
								<div class="form-group">
									<input hidden class="form-control" type="text" value="<?=$bicicleta->categoria?>" name="categoria" required>
								</div>
								<div class="form-group">
									<input hidden class="form-control" type="text" value="<?=$bicicleta->fechaini?>" name="fechaini" required>
								</div>
								<div class="form-group">
									<input hidden class="form-control" type="text" value="<?=$bicicleta->fechafin?>" name="fechafin" required>
								</div>
								<div class="form-group" style="padding-top: 3px;">
									<button class="btn btn-primary" onclick="history.go(-1);">Atras</button>
									<button type="submit" class="btn btn-primary">Actualizar</button>
								</div>
							</form>
						</div>
						<div class="col-1" style="background-color: ;">
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
									<img class="car-img-top" style="width: 50px; height: 50px;" src="<?php echo base_url('/img/graph.png'); ?>" alt="Card image cap">
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
						<img class="car-img-top" style="width: 350px; height: 200px; padding: 5px;" src="<?php echo base_url('/img/graph.png'); ?>" alt="Card image cap">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
   
</body>
</html>
