<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Master</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle2.css'); ?>">
	<link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />

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
			<form method="post">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input class="form-control" type="search" name="popo" placeholder="Buscalo aqui!!" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<select class="form-control" name="categoria">
									<option value="">- Categoria -</option>
									<option value="1">Bicicleta</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<button class="btn">Buscar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-md-8">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true" onclick="openCity(event, 'user')">Usuarios</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="noticia-tab" data-toggle="tab" href="#noticia" role="tab" aria-controls="noticia" aria-selected="false" onclick="openCity(event, 'noticia')">Noticias</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="evento-tab" data-toggle="tab" href="#evento" role="tab" aria-controls="evento" aria-selected="false" onclick="openCity(event, 'evento')">Eventos</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="banner-tab" data-toggle="tab" href="#banner" role="tab" aria-controls="banner" aria-selected="false" onclick="openCity(event, 'banner')">Banners</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane active" id="user">
				  	<div class="card">
					  	<div class="col-md-6">  		
					  		<form method="post" action="<?php echo base_url('master/guardarUser');?>">
					  			<div class="form-group">
					  				<label>Id</label>
					  				<input type="text" class="form-control" value="<?=$usuario->id?>" name="id" readonly>
					  			</div>
					  			<div class="form-group">
					  				<label>Username</label>
					  				<input type="text" class="form-control" value="<?=$usuario->username?>" name="username" required>
					  			</div>
					  			<div class="form-group">
					  				<label>Password</label>
					  				<input type="text" class="form-control" value="<?=$usuario->password?>" name="password" required >
					  			</div>
					  			<div class="form-group">
					  				<label>Nombre</label>
					  				<input type="text" class="form-control" value="<?=$usuario->nombre?>" name="nombre" required >
					  			</div>
					  			<div class="form-group">
					  				<label>Apellido</label>
					  				<input type="text" class="form-control" value="<?=$usuario->apellido?>" name="apellido" required >
					  			</div>
					  			<div class="form-group">
					  				<label>Correo</label>
					  				<input type="text" class="form-control" value="<?=$usuario->correo?>"  name="correo" required>
					  			</div>
					  			<div class="form-group">
					  				<label>Acerca</label>
					  				<textarea class="form-control" name="acerca" required><?=$usuario->acerca?></textarea>
					  			</div>
								<div class="form-group">
									<button class="btn btn-primary">Guardar</button>
								</div>
					  		</form>
					  	</div>
					  	<div class="table-responsive col-md-10">
					  		<table class="table">
					  			<thead>
					  				<tr>
					  					<th>
					  						Id
					  					</th>
					  					<th>
					  						Username
					  					</th>
					  					<th>
					  						Nombre
					  					</th>
					  					<th>
					  						Apellido
					  					</th>
					  					<th>
					  						Admin
					  					</th>
					  					<th>
					  						Acciones
					  					</th>
					  				</tr>
					  			</thead>
					  			<tbody>
					  				<?php
					  				foreach ($usuarios as $usi) {
					  					$edit = base_url("master/?user={$usi->id}");
					  					$make = base_url("master/makeadmin/?id={$usi->id}");
					  					$delete = base_url("master/eliminar/?id={$usi->id}");
					  					$tool = "Dar privilegios admin";
					  					$admin ="user";
					  					if($usi->admin==1)
					  					{	
					  						$admin="admin"; 
					  						$make = base_url("master/makenormal/?id={$usi->id}");
					  						$tool = "Quitar privilegios";
					  					}
					  					echo "
					  						<tr>
					  							<td>
					  							{$usi->id}
					  							</td>
					  							<td>
					  							{$usi->username}
					  							</td>
					  							<td>
					  							{$usi->nombre}
					  							</td>
					  							<td>
					  							{$usi->apellido}
					  							</td>
					  							<td>
					  							{$usi->admin}
					  							</td>
					  							<td>
					  							<ul>
							  						<li>
							  							<a href='{$edit}' class='btn tito'><span class='edit' data-toggle='tooltip' data-placement='top' title='Editar usuario'></span></a>
							  						</li>
							  						<li>
						  							<a href='{$delete}' class='btn tito' onclick='return validar();'data-toggle='tooltip' data-placement='top' title='Borrar usuario' ><span class='delete'></span></a>
							  						</li>
							  						<li>
							  							<a href='{$make}' class='btn tito' data-toggle='tooltip' data-placement='top' title='{$tool}'><span class='{$admin}'></span></a>
							  						</li>
							  					</ul>
					  							</td>
					  						</tr>
					  							";
					  				}
					  				?>
					  			</tbody>
					  		</table>
					  	</div>
					  	<div class="" style="text-align: right; ">	
							<?php
							$link = base_url('master/');
							if($todoU['totalpagesu']>0){
								$pp = 'Next';
								$ppi = 'Previous';
								echo '<nav class="pagination">';
								echo '<ul class="pagination">';
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?pageu='.($todoU['pageu']-1).'">'.$ppi.'</a></li>';
								for($i=1;$i<=$todoU['totalpagesu'];$i++){
									if($i==$todoU['pageu']){
										echo '<li class="page-item"><a class="page-link active">'.$i.'</a></li>';
									}
									else{
										echo '<li class="page-item"><a class="page-link" href="'.$link.'?pageu='.$i.'">'.$i.'</a></li>';
									}
								}
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?pageu='.($todoU['pageu']+1).'">'.$pp.'</a></li>';
								echo "</nav>";
							}
							?>	
						</div>
				  	</div>
				  </div>
				  <div class="tab-pane "  id="noticia">
				  	<div class="card">
				  			<form method="post" action="<?php echo base_url('master/guardarNoticia');?>" enctype="multipart/form-data">
				  				<div class="col-md-6">
					  				<div class="form-group">
					  					<label>Id</label>
					  					<input class="form-control" type="text" value="<?=$noticia->id?>" name="id" readonly>
					  				</div>
					  				<div class="form-group">
					  					<label>Ttulo</label>
					  					<input class="form-control" type="text" value="<?=$noticia->titulo?>" name="titulo" required>
					  				</div>
				  				</div>
				  				<div class="col-md-12">
					  				<div class="form-group">
					  					<label>Contenido</label>
					  					<textarea id="contenido" class="form-control" name="contenido" required><?=$noticia->contenido?></textarea>
					  				</div>
					  				<div class="form-group">
				  						<button class="btn btn-primary" type="submit">Guardar</button>
				  					</div>
				  				</div>
				  				<div class="form-group">
				  					<input hidden class="form-control" type="text" value="<?=$noticia->fecha?>" name="fecha">
				  				</div>
				  			</form>
				  	</div>
				  	<div class="table-responsive col-md-10">
				  		<table class="table">
				  			<thead>
				  				<tr>
				  					<th>
				  						Id
				  					</th>
				  					<th>
				  						Titulo
				  					</th>
				  					<th>
				  						Fecha
				  					</th>
				  					<th>
				  						Accion
				  					</th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  				<?php
				  				foreach ($noticias as $noti) {
				  					$edit = base_url("master/?noti={$noti->id}");
					  				$delete = base_url("master/eliminarnoticia/?del={$noti->id}");
					  				$ver = base_url("/master/detallenoticia/?info={$noti->id}");
				  					echo "
				  						<tr>
				  							<td>
				  							{$noti->id}
				  							</td>
				  							<td>
				  							<a href='{$ver}' >{$noti->titulo}</a>
				  							</td>
				  							<td>
				  							{$noti->fecha}
				  							</td>
				  							<td>
				  							<ul>
							  					<li>
							  						<a href='{$edit}' class='btn tito'><span class='edit' data-toggle='tooltip' data-placement='top' title='Editar noticia'></span></a>
							  					</li>
							  					<li>
						  							<a href='{$delete}' class='btn tito' onclick='return validar();'data-toggle='tooltip' data-placement='top' title='Borrar noticia' ><span class='delete'></span></a>
							  					</li>
							  				</ul>
				  							</td>
				  						</tr>
				  							";
				  				}
				  				?>
				  			</tbody>
				  		</table>
				  	</div>
				  	<div class="" style="text-align: right; ">	
							<?php
							$link = base_url('master/');
							if($todoN['totalpagesn']>0){
								$pp = 'Next';
								$ppi = 'Previous';
								echo '<nav class="pagination">';
								echo '<ul class="pagination">';
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?pagen='.($todoN['pagen']-1).'">'.$ppi.'</a></li>';
								for($i=1;$i<=$todoN['totalpagesn'];$i++){
									if($i==$todoN['pagen']){
										echo '<li class="page-item"><a class="page-link active">'.$i.'</a></li>';
									}
									else{
										echo '<li class="page-item"><a class="page-link" href="'.$link.'?pagen='.$i.'">'.$i.'</a></li>';
									}
								}
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?pagen='.($todoN['pagen']+1).'">'.$pp.'</a></li>';
								echo "</nav>";
							}
							?>	
						</div>
				  </div>
				  <div class="tab-pane "  id="evento">
				  	<div class="card">
				  		<div class="col-md-6">
				  			<form method="post" action="<?php echo base_url('master/guardarEvento'); ?>" enctype="multipart/form-data">
				  				<div class="form-group">
				  					<label>Id</label>
				  					<input class="form-control" type="text" value="<?=$evento->id?>" name="id" readonly>
				  				</div>
				  				<div class="form-group">
				  					<label>Nombre</label>
				  					<input class="form-control" type="text" value="<?=$evento->nombre?>" name="nombre" required>
				  				</div>
				  				<div class="form-group">
				  					<label>Tipo</label>
				  					<select class="form-control" name="tipo">
				  						<option value="">- Seleccione algo -</option>
				  						<?php 
											$option = array('Ruta','MTB');
											$output = '';
											for( $i=0; $i<count($option); $i++ ) {
											    if($evento->tipo==$option[$i]){
											     	echo "<option value='{$option[$i]}' selected>{$option[$i]}</option>";
											    }else{
											     	echo "<option value='{$option[$i]}'>{$option[$i]}</option>";
											    }
											}
										?>
				  					</select>
				  				</div>
				  				<div class="form-group">
				  					<label>Lugar</label>
				  					<input class="form-control" type="text" value="<?=$evento->lugar?>" name="lugar" required>
				  				</div>
				  				<div class="row">
				  					<div class="col-md-6">
				  						<div class="form-group">
						  					<label>Latitud</label>
						  					<input class="form-control" type="text" value="<?=$evento->lat?>" name="lat" required>
						  				</div>
				  					</div>
				  					<div class="col-md-6">
				  						<div class="form-group">
						  					<label>Longitud</label>
						  					<input class="form-control" type="text" value="<?=$evento->lng?>" name="lng" required>
						  				</div>
				  					</div>
				  				</div>
				  				<div class="row">
				  					<div class="col-md-6">
				  						<div class="form-group">
						  					<label>Fecha</label>
						  					<input class="form-control"type="text" value="<?=$evento->fecha?>" name="fecha" placeholder="YYYY-MM-DD" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY-MM-DD">
						  				</div>
				  					</div>
				  					<div class="col-md-6">
				  						<div class="form-group">
						  					<label>Hora</label>
						  					<input class="form-control" type="text" value="<?=$evento->hora?>" name="hora" required>
						  				</div>
				  					</div>
				  				</div>
				  				<div class="form-group">
				  					<label>Descripcion</label>
				  					<textarea class="form-control" name="descripcion" required><?=$evento->descripcion?></textarea>
				  				</div>
				  				<div class="form-group">
				  					<label>Enlace para mas info</label>
				  					<input type="text" class="form-control" value="<?=$evento->enlace?>" name="enlace" required>
				  				</div>
				  				<div class="custom-file">
									<input class="custom-file-input" type="file" name="imagen" required>
									<label class="custom-file-label">Imagen</label>
								</div>
								<div class="form-group">
				  					<input hidden type="text" value="<?=$evento->idadmin?>" class="form-control" name="idadmin">
				  				</div>
								<div class="form-group">
									<button class="btn btn-success" type="submit">Guardar</button>
								</div>
				  			</form>
				  		</div>
				  		<div class="table-responsive">
				  			<table class="table">
				  				<thead>
				  					<tr>
				  						<th>
				  							Id
				  						</th>
				  						<th>
				  							Nombre
				  						</th>
				  						<th>
				  							Lugar
				  						</th>
				  						<th>
				  							Fecha
				  						</th>
				  						<th>
				  							Acciones
				  						</th>
				  					</tr>
				  				</thead>
				  				<tbody>
				  					<?php
				  					foreach ($eventos as $event) {
				  						$edit = base_url("master/?eve={$event->id}");
				  						$delete = base_url("master/eliminarevento/?event={$event->id}");
				  						$ver = base_url("master/detallevento/?event={$event->id}");
				  						echo "
				  								<tr>
				  									<td>
				  										{$event->id}
				  									</td>
				  									<td>
				  										<a href='{$ver}'>{$event->nombre}</a>
				  									</td>
				  									<td>
				  										{$event->lugar}
				  									</td>
				  									<td>
				  										{$event->fecha}
				  									</td>
				  									<td>
				  										<ul>
									  						<li>
									  							<a href='{$edit}' class='btn tito'><span class='edit' data-toggle='tooltip' data-placement='top' title='Editar usuario'></span></a>
									  						</li>
									  						<li>
								  							<a href='{$delete}' class='btn tito' onclick='return validar();'data-toggle='tooltip' data-placement='top' title='Borrar usuario' ><span class='delete'></span></a>
									  						</li>
									  					</ul>
				  									</td>
				  								</tr>
				  							";
				  					}
				  					?>
				  				</tbody>
				  			</table>
				  		</div>
				  		<div class="" style="text-align: right; ">	
							<?php
							$link = base_url('master/');
							if($todoT['totalpagest']>0){
								$pp = 'Next';
								$ppi = 'Previous';
								echo '<nav class="pagination">';
								echo '<ul class="pagination">';
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?paget='.($todoT['paget']-1).'">'.$ppi.'</a></li>';
								for($i=1;$i<=$todoT['totalpagest'];$i++){
									if($i==$todoT['paget']){
										echo '<li class="page-item"><a class="page-link active">'.$i.'</a></li>';
									}
									else{
										echo '<li class="page-item"><a class="page-link" href="'.$link.'?paget='.$i.'">'.$i.'</a></li>';
									}
								}
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?paget='.($todoT['paget']+1).'">'.$pp.'</a></li>';
								echo "</nav>";
							}
							?>	
						</div>
				  	</div>
				  </div>
				   <div class="tab-pane "  id="banner">

				  </div>
				</div>
			</div>
			<div class="col-md-4" style="padding: 5px;">
				<div class="row" style="padding: 5px;">
					<div class="col card">
						<img class="car-img-top" style="padding: 5px;" src="mthumb.php?src=<?php echo base_url('/img/graph.png'); ?>&w=350&h=200&q=100" alt="Card image cap">
					</div>
				</div>
				<div class="row" style="padding: 5px;">
					<div class="col card">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBMX-1616978795236318%2F&tabs=timeline&width=350&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
				
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js');?>"></script>
    
    <script type="text/javascript">
    	function openCity(evt, cityName) {
	        var i, tabcontent, tablinks;
	        tabcontent = document.getElementsByClassName("tabcontent");
	        for (i = 0; i < tabcontent.length; i++) {
	            tabcontent[i].style.display = "none";
	        }
	        tablinks = document.getElementsByClassName("nav-link");
	        for (i = 0; i < tablinks.length; i++) {
	            tablinks[i].className = tablinks[i].className.replace(" active", "");
	        }
	        //document.getElementById(cityName).style.display = "show";
	        evt.currentTarget.className += " active";
		}

		function validar() {
	      return confirm("Esta informacion se eliminara permanentemente, estas seguro?")
	    }
	    $(function () {
	      $('[data-toggle="tooltip"]').tooltip()
	    })
	      jQuery(function ($) {
	          $("#contenido").shieldEditor({
	              height: 260
	          });
	      }); 
    </script>
</body>
</html>