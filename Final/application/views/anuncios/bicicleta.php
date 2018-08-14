<?php
echo $_POST['categoria'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar bicicleta</title>
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
		  <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100"></div>
		</div>
		<h4>Agregar anuncio</h4>
		<div class="row">
			<div class="col-1" style="background-color: ;">
			</div>
			<div class="col" style="padding: 20px;">
				<div class="row">
					<div class="col-md-auto">
						<h5><b>Categoria:</b></h5>
					</div>
					<div class="col">
						<?=$categoria?>
					</div>
				</div>
				<h6>Cada anuncio tendra una vigencia de 45 dias</h6>
				<div class="col-md-8">
					<form method="post" action="<?php echo base_url('anuncio/guardarBici'); ?>" enctype="multipart/form-data">
						<div class="form-group">
							<input hidden readonly class="form-control" type="text" name="id">
						</div>
						<div class="form-group">
							<label>Provincia (*)</label>
							<select class="form-control provincia" name="provincia" required="">
								<option value="">- Seleccione -</option>
								<option value="Distrito Nacional">Distrito Nacional</option>
								<option value="Azua">Azua</option>
								<option value="Bahoruco">Bahoruco</option>
								<option value="Barahona">Barahona</option>
								<option value="Dajabón">Dajabón</option>
								<option value="Duarte">Duarte</option>
								<option value="El Seibo">El Seibo</option>
								<option value="Elías Piña">Elías Piña</option>
								<option value="Espaillat">Espaillat</option>
								<option value="Hato Mayor">Hato Mayor</option>
								<option value="Hermanas Mirabal">Hermanas Mirabal</option>
								<option value="Independencia">Independencia</option>
								<option value="La Altagracia">La Altagracia</option>
								<option value="La Romana">La Romana</option>
								<option value="La Vega">La Vega</option>
								<option value="María Trinidad Sánchez">María Trinidad Sánchez</option>
								<option value="Monseñor Nouel (Bonao)">Monseñor Nouel (Bonao)</option>
								<option value="Monte Cristi">Monte Cristi</option>
								<option value="Monte Plata">Monte Plata</option>
								<option value="Pedernales">Pedernales</option>
								<option value="Peravia">Peravia</option>
								<option value="Puerto Plata">Puerto Plata</option>
								<option value="Samaná">Samaná</option>
								<option value="San Cristóbal">San Cristóbal</option>
								<option value="San José de Ocoa">San José de Ocoa</option>
								<option value="San Juan">San Juan</option>
								<option value="San Pedro de Macorís">San Pedro de Macorís</option>
								<option value="Sánchez Ramírez">Sánchez Ramírez</option>
								<option value="Santiago">Santiago</option>
								<option value="Santiago Rodríguez">Santiago Rodríguez</option>
								<option value="Santo Domingo">Santo Domingo</option>
								<option value="Valverde Mao">Valverde Mao</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tel./cel (*)</label>
							<input class="form-control" type="text" name="telefono" required>
						</div>
						<div class="form-group">
							<label>Tipo (*)</label>
							<select class="form-control bicicleta" name="tipo" required="">
								<option value="">- Seleccione -</option>
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
						<div class="form-group">
							<label>Marca(*)</label>
							<select class="form-control" name="marca" required="">
								<option value="">- Seleccione -</option>
								<option value="BH">BH</option>
								<option value="Bianchi">Bianchi</option>
								<option value="BMC">BMC</option>
								<option value="Cannondale">Cannondale</option>
								<option value="Carolina">Carolina</option>
								<option value="Cervelo">Cervelo</option>
								<option value="Colnago">Colnago</option>
								<option value="Cube">Cube</option>
								<option value="Cyfac">Cyfac</option>
								<option value="Diamondback">Diamondback</option>
								<option value="Eagle">Eagle</option>
								<option value="Ellsworth">Ellsworth</option>
								<option value="Felt">Felt</option>
								<option value="Fuji">Fuji</option>
								<option value="Gary Fisher">Gary Fisher</option>
								<option value="Giant">Giant</option>
								<option value="GT">GT</option>
								<option value="Hasa">Hasa</option>
								<option value="Hoffman">Hoffman</option>
								<option value="Huffy">Huffy</option>
								<option value="Hussar">Hussar</option>
								<option value="Iron Horse">Iron Horse</option>
								<option value="Jamis">Jamis</option>
								<option value="Julen">Julen</option>
								<option value="Klein">Klein</option>
								<option value="Kona">Kona</option>
								<option value="KTM">KTM</option>
								<option value="Lapierre">Lapierre</option>
								<option value="LeMond">LeMond</option>
								<option value="Litespeed">Litespeed</option>
								<option value="Look">Look</option>
								<option value="Marin">Marin</option>
								<option value="Merida">Merida</option>
								<option value="Mongoose">Mongoose</option>
								<option value="Montecci">Montecci</option>
								<option value="Motobecane">Motobecane</option>
								<option value="Niner">Niner</option>
								<option value="Peugeot">Peugeot</option>
								<option value="Pilot">Pilot</option>
								<option value="Pinarello">Pinarello</option>
								<option value="Raleigh">Raleigh</option>
								<option value="Ridley">Ridley</option>
								<option value="Salsa">Salsa</option>
								<option value="Santa Cruz">Santa Cruz</option>
								<option value="Scapin">Scapin</option>
								<option value="Schwinn">Schwinn</option>
								<option value="Scott">Scott</option>
								<option value="Specialized">Specialized</option>
								<option value="Trek">Trek</option>
								<option value="Wilier">Wilier</option>
								<option value="Yeti">Yeti</option>
								<option value="Otras">Otras</option>
							</select>
						</div>
						<div class="form-group">
							<label>Modelo</label>
							<input class="form-control" type="text" name="modelo">
						</div>
						<div class="form-group">
							<label>Tamano aro (*)</label>
							<select class="form-control" name="tmaro" required="">
								<option value="">- Seleccione -</option>
								<option value="12 pulgadas">12 pulgadas</option>
								<option value="16 pulgadas">16 pulgadas</option>
								<option value="20 pulgadas">20 pulgadas</option>
								<option value="24 pulgadas">24 pulgadas</option>
								<option value="26 pulgadas">26 pulgadas</option>
								<option value="29 pulgadas">29 pulgadas</option>
								<option value="700c">700c</option>
								<option value="Otro">Otro</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tamano cuadro (*)</label>
							<select class="form-control" name="tmcuadro" required="">
								<option value="">- Seleccione -</option>
								<option value="Desconocido">Desconocido</option>
								<option value="Niños">Niños</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
								<option value="XXL">XXL</option>
							</select>
						</div>
						<div class="form-group">
							<label>Accion (*)</label>
							<select class="form-control" name="accion" required="">
								<option value="">- Seleccione -</option>
								<option value="Vender">Vender</option>
								<option value="Comprar">Compar</option>
								<option value="Alquilar">Alquilar</option>
							</select>
						</div>
						<div class="form-group">
							<label>Moneda</label>
							<select class="form-control" name="moneda">
								<option value="0">- Seleccione -</option>
								<option value="$">$</option>
								<option value="USD$">USD$</option>
							</select>
						</div>
						<div class="form-group">
							<label>Precio (*)</label>
							<input class="form-control" type="text" name="precio" required>
						</div>
						<div class="form-group">
							<label>Titulo del anuncio (*)</label>
							<input class="form-control" type="text" name="titulo" required>
						</div>
						<div class="form-group">
							<label>Descripcion (*)</label>
							<textarea class="form-control" name="descripcion" required></textarea>
						</div>
						<div class="custom-file">
							<input class="custom-file-input" type="file" name="imagen">
							<label class="custom-file-label">Imagen</label>
						</div>
						<div class="form-group">
							<input hidden class="form-control" type="text" value="<?=$_POST['categoria']?>" name="categoria" required>
						</div>
						<div class="form-group" style="padding-top: 3px;">
							<button class="btn btn-primary" onclick="history.go(-1);">Atras</button>
							<button type="submit" class="btn btn-primary">Continuar</button>
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

