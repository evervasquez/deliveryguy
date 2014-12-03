<!DOCTYPE html>
<html lang="es_ES">

	<head>
		<meta charset="UTF-8">
		<title>..:DeliveryGuy:..</title>
		<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
		<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'> -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700,400' rel='stylesheet' type='text/css'>
		{{ HTML::style('assets/css/estilos.css'); }}
		{{ HTML::style('assets/css/normalize.css'); }}


	</head>
	<body>
		<header class="MainMenu">
		  	<figure class="MainMenu-containerImage">
				<a clsss="MainMenu-logoLink" href="#">

				{{ HTML::image('assets/img/logoOficial.png','',array('class' => 'MainMenu-image')) }}
				</a>
			</figure>

			<div class="MainMenu-ContainerOption">
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Descargar</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Soporte</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Preguntas frecuentes</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Publicidad</a></p>
				<p class="MainMenu-optionSignIn"><a class="MainMenu-linkSignIn" href="{{route('sign-in')}}">Registrate</a></p>
			</div>
		</header>

		<section class="InfoPrincipal">
	 		<div class="InfoPrincipa-phone">
	 			<firgure class="InfoPrincipal-containerImage">
	 			 {{ HTML::image('assets/img/phone.png','',array('class' => 'InfoPrincipal-image')) }}
	 			</firgure>
	 		</div>
			<div class="InfoPrincipal-containerDescription">
				<p class="InfoPrincipal-title">Te Presentamos a <br><span class="InfoPrincipal-marca">DeliveryGuyApp</span></p>
				<p class="InfoPrincipal-subtitle">La Aplicacion que estabas esperando para la entrega rápida y eficaz de tus deliverys, facil y segura <br><a class="InfoPrincipal-more" href="">Leer Mas...</a></p>
				<figure class="InfoPrincipal-imgStore">
				 <a href="#">{{ HTML::image('assets/img/apple.png','',array('class' => '')) }}</a>
				 <a href="#">{{ HTML::image('assets/img/google.png','',array('class' => 'Header-image')) }}</a>
				</figure>
			</div>
		</section>
		
		<section class="RequestDelivery">
			<article class="RequestDelivery-container">
				<div class="RequestDelivery-content">
					<h2 class="RequestDelivery-title">Solicita y separa tus Delivery's de la manera mas fácil</h2>
					<p class="RequestDelivery-description">Sientete cómodo al momento de pedir tus delivery's. <br> Desde la comodidad de tu casa, oficina o cualquier otro lugar en donde te encuentres, todo al alcanse de tus manos, DeliveryGuyApp </p>
				</div>
				<figure class="RequestDelivery-imageContainer">
					{{ HTML::image('assets/img/imagen.png','',array('class' => 'RequestDelivery-image')) }}
				</figure>
					
			</article>
			
		</section>


		<section class="TrackingDelivery">
			<div id="map_canvas" ></div>	
			<article>
				<h2 class="TrackingDelivery-title">Sigue y Verifica tus Deliverys</h2>
			</article>			
		</section>

	</body>
	   <script type="text/javascript">
		    function initialize() {
		        var marcador=null;
		        var mapa = new google.maps.Map(document.getElementById("map_canvas"),
		            {
		                center: new google.maps.LatLng(25.794327247836158, -80.20522713661194),
		                zoom: 10,
		                mapTypeId: google.maps.MapTypeId.ROADMAP
		            });
		        //Creo un evento asociado a "mapa" cuando se hace "click" sobre el
		      
		    }
		    function loadScript() {

		        var script = document.createElement("script");
		        script.type = "text/javascript";
		        script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCAQb4QGnRfACuyzxoA6v1EYwJhNxSY6kQ&sensor=false&callback=initialize";
		        document.body.appendChild(script);
		    }
		    window.onload = loadScript;
</script>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</html>