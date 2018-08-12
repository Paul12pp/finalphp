<?php
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel de control</title>
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
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="openCity(event, 'home')">Mis anuncios</a>
				  </li>
				</ul>
				  <div class="tab-content" id="myTabContent">
				  <div class="tab-pane active" id="home">
				  	<div class="col-md-12">
				  		<p>
				  			En esta sesion se encuentran todos tus anuncios publicados.
				  			Tienes el control sobre ellos, puedes desactivarlos, editarlos
				  			y si es necesario borrarlos.
				  		</p>
				  	</div>
				  	<div class="table-responsive">
						<table class="table">
						  <thead class="thead-light">
						    <tr>
						      <th>#</th>
						      <th>Titulo</th>
						      <th>Fecha</th>
						      <th>Estado</th>
						      <th>Acciones</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  	$id =1;
						  	$stado = 'Inactivo';
						  	$clase = 'play';
						  	$tool= 'Activar anuncio';
						  	foreach ($todos as $bici) {
						  		$delete = base_url("anuncio/eliminar/?id={$bici->id}");
						  		$pause = base_url("anuncio/play/?id={$bici->id}");
						  		if($bici->categoria=='Bicicleta'){$edit = base_url("/anuncio/editb/?id={$bici->id}"); $ver = base_url("/anuncio/detalle/?id={$bici->id}");}
								if($bici->categoria=='Accesorio'){$edit = base_url("/anuncio/editac/?id={$bici->id}"); $ver = base_url("/anuncio/detalleac/?id={$bici->id}");}
								if($bici->categoria=='Servicio'){$edit = base_url("/anuncio/editcv/?id={$bici->id}"); $ver = base_url("/anuncio/detallecv/?id={$bici->id}");}
								if($bici->categoria=='Componente'){$edit = base_url("/anuncio/editcp/?id={$bici->id}"); $ver = base_url("/anuncio/detallecp/?id={$bici->id}");}
						  		
						  		if($bici->status == '1'){
						  			$stado ='Activo';
						  			$clase ='pause';
						  			$tool= 'Desactivar anuncio';
						  			$pause = base_url("anuncio/pause/?id={$bici->id}");
						  		}
						  		$fecha =  date("j F, Y", $bici->fechaini);
						  		echo "<tr>
						  				<td>
						  					{$id}
						  				</td>
						  				<td>
							  				<div class='row'>
									      		<b><a href='{$ver}'>{$bici->titulo}</a></b>
									      	</div>
									      	<div class='row'>
									      		<div class='col-md-auto'>
									      			{$bici->tipo}
									      		</div>
									      	</div>
						  				</td>
						  				<td>{$fecha}</td>
						  				<td>
						  					{$stado}
						  				</td>
						  				<td>
						  					<ul>
						  						<li>
						  							<a href='{$edit}' class='btn tito'><span class='edit' data-toggle='tooltip' data-placement='top' title='Editar anuncio'></span></a>
						  						</li>
						  						<li>
						  							<a href='{$delete}' class='btn tito' onclick='return validar();'data-toggle='tooltip' data-placement='top' title='Borrar anuncio' ><span class='delete'></span></a>
						  						</li>
						  						<li>
						  							<a href='{$pause}' class='btn tito' data-toggle='tooltip' data-placement='top' title='{$tool}'><span class='{$clase}'></span></a>
						  						</li>
						  					</ul>
						  				</td>
						  		</tr>";
						  		$id+=$id;
						  	}
						  	?>
						  </tbody>
						</table>
						<div class="" style="text-align: right; ">	
							<?php
							$link = base_url('anuncio/panel/');
							if($totalpages>0){
								$pp = 'Next';
								$ppi = 'Previous';
								echo '<nav class="pagination">';
								echo '<ul class="pagination">';
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?page='.($page-1).'">'.$ppi.'</a></li>';
								for($i=1;$i<=$totalpages;$i++){
									if($i==$page){
										echo '<li class="page-item"><a class="page-link active">'.$i.'</a></li>';
									}
									else{
										echo '<li class="page-item"><a class="page-link" href="'.$link.'?page='.$i.'">'.$i.'</a></li>';
									}
								}
								echo '<li class="page-item"><a class="page-link" href="'.$link.'?page='.($page+1).'">'.$pp.'</a></li>';
								echo "</nav>";
							}
							?>	
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
									<?php $link=base_url();?>
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
						<?php $link=base_url();

						if($segundoban[0]->imagen=='')
						{
							echo "{$segundoban[0]->codigo}";
						}else{
							echo "<img class='car-img-top' style='padding: 5px;'' src='{$link}mthumb.php?src={$link}{$segundoban[0]->imagen}&w=350&h=400&q=100' alt='Card image cap'>";
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
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
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

	</script>
</body>
</html>
