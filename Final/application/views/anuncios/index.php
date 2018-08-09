<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/bootstrap/css/mystyle.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/caleandar-master/css/demo.css');?>"/>
    <link rel="stylesheet" href="<?php echo base_url('/caleandar-master/css/theme1.css');?>"/>
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
			<div class="col-md-8">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item active">
				    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="openCity(event, 'home')">Lo mas nuevo</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="openCity(event, 'profile')">Aleatorio</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane active" id="home">
				  	<?php
				  		foreach ($todos as $bici) {
				  			if($bici->categoria=='Bicicleta'){$ver = base_url("/anuncio/detalle/?id={$bici->id}");}
							if($bici->categoria=='Accesorio'){$ver = base_url("/anuncio/detalleac/?id={$bici->id}");}
							if($bici->categoria=='Servicio'){$ver = base_url("/anuncio/detallecv/?id={$bici->id}");}
							if($bici->categoria=='Componente'){$ver = base_url("/anuncio/detallecp/?id={$bici->id}");}
							$descr = substr($bici->descripcion,0, 260);
				  			
				  			$link = base_url();
				  			$fecha = $bici->fechaini;
							$d2 = strtotime('+0 days');
							$d2 = date_create(date('Y-m-d',$d2));
							//$d3 = strtotime('+1 days');
							$d3 = date_create(date('Y-m-d',$fecha));

							$interval = date_diff($d2, $d3);
							$fecha = $interval->format('%R%a días');
							if($fecha=="+0 días")
							{
								$fecha = str_replace("+0 días", "Hoy mismo", $fecha);
							}else{
								$fecha = str_replace("-", "Hace ", $fecha);
							}
				  			echo "
				  				<div class='card'>
									<div class='card-body'>
										<div class='row'>
											<div class='col-md-auto'>
												<a href='{$ver}'><img class='car-img-top' src='mthumb.php?src={$link}{$bici->imagen}&w=150&h=150' alt='Card image cap'></a>
											</div>
											<div class='col'>
												<div class='row'>
													<div class='col-8 align-self-start'>
														<h5 class='card-title'><b>{$bici->titulo}</b></h5>
														<div class='row'>
															<div class='col-md-auto'>
																<h6 class='card-subtitle mb-2 text-muted'>{$bici->tipo}</h6>
															</div>
															<div class='col'>
																<h6 class='card-subtitle mb-2 text-muted'>{$bici->username}</h6>
															</div>
															<div class='col'>
																<h6 class='card-subtitle mb-2 text-muted'>{$fecha}</h6>
															</div>
														</div>
													</div>
													<div class='col align-self-end'>
														<h4>{$bici->moneda}{$bici->precio}</h4>
													</div>
												</div>
												<p class='card-text'>{$descr}...</p>
												<a href='{$ver}' class='card-link'>Ver</a>
											</div>
										</DIV>
									</div>											  						  		
								</div>";
				  			
				  		}
				  	?>
				  	<div class="" style="text-align: right; ">	
						<?php
						$link = base_url('anuncio/');
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
				  <div class="tab-pane "  id="profile">
				  	Cosas aleatorioas
				  	<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-auto">
									<img class="car-img-top" style="width: 100px; height: 100px;" src="mthumb.php?src=<?php echo base_url('/img/graph.png'); ?>" alt="Card image cap">
								</div>
								<div class="col">
									<h5 class="card-title"><b>Card title</b></h5>
									<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="card-link">Card link</a>
									<a href="#" class="card-link">Another link</a>
								</div>
							</DIV>
						</div>											  						  			
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-auto">
									<img class="car-img-top" style="width: 100px; height: 100px;" src="<?php echo base_url('/img/graph.png'); ?>" alt="Card image cap">
								</div>
								<div class="col">
									<h5 class="card-title"><b>Card title</b></h5>
									<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="card-link">Card link</a>
									<a href="#" class="card-link">Another link</a>
								</div>
							</DIV>
						</div>											  						  			
					</div>
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
				<div class="row card" id="caleandar" style="padding: 5px;">
					<div class="text-center"><h4>Eventos proximos</h4></div>
				</div>
			</div>
		</div>
		<div class="row">
				
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/caleandar-master/js/caleandar.js');?>"></script>
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

	    $(function () {
	      $('[data-toggle="tooltip"]').tooltip()
	    })

		var events = [
		  {'Date': new Date(2016, 6, 7), 'Title': 'Doctor appointment at 3:25pm.'},
		  {'Date': new Date(2016, 6, 18), 'Title': 'New Garfield movie comes out!', 'Link': 'https://garfield.com'},
		  {'Date': new Date(2016, 6, 27), 'Title': '25 year anniversary', 'Link': 'master'},
		];
		<?php
		foreach ($eventos as $ke) {
			$ke->fecha = str_replace("-", ",", $ke->fecha);
		}
		$js_array = json_encode($eventos);
		echo "var javascript_array = ". $js_array . ";\n";
		?>
		for(var i=0;i<javascript_array.length;i++){
			events.push({'Date': new Date(javascript_array[i].fecha), 'Title': javascript_array[i].nombre, 'Link': 'master/detallevento/?event='+javascript_array[i].id});
		}
		var settings = {};
		var element = document.getElementById('caleandar');
		caleandar(element, events, settings);
	</script>


</body>
</html>