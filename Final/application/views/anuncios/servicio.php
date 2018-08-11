<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar servicio</title>
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
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="<?php echo base_url('autorizacion/salir'); ?>
              " aria-expanded="false" aria-controls="nav-collapse2">Salir</a>
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
						<div class="form-group servi">
							<label>Seleccione un servicio</label>
							<select class="form-control servicio" name="tipo" required="">
								<option value="">Seleccione algo</option>
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

