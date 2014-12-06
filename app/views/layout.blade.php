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
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="{{route('sign-in')}}">Login</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Menu</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Preguntas frecuentes</a></p>
				<p class="MainMenu-option"><a class="MainMenu-linkOption" href="">Ayuda</a></p>
				<p class="MainMenu-optionSignIn"><a class="MainMenu-linkSignIn" href="">Descargar</a></p>
			</div>
		</header>

		<section class="InfoPrincipal">
	 		<div class="InfoPrincipa-phone">
	 			<firgure class="InfoPrincipal-containerImage">
	 			 {{ HTML::image('assets/img/phone.png','',array('class' => 'InfoPrincipal-image')) }}
	 			</firgure>
	 		</div>
			<div class="InfoPrincipal-containerDescription">
				<p class="InfoPrincipal-title ">Te Presentamos a <br><span class="InfoPrincipal-marca">DeliveryGuyApp !</span></p>
				<p class="InfoPrincipal-subtitle">A conectar los deliveries con los consumidores de una forma mas fácil, rápida y segura.<br><a class="InfoPrincipal-more" href="">Leer Mas...</a></p>

				<div class="InfoPrincipal-assoContainer">
					<p class="InfoPrincipal-linkContainer "><a href="" class="InfoPrincipal-link "><span class="icon-food"></span>Asociate como Restaurant</a></p>
					<p class="InfoPrincipal-linkContainer "><a href="" class="InfoPrincipal-link"><span class="icon-truck"></span>Asociate como Repartidor</a></p>
				</div>
			<!-- 	<figure class="InfoPrincipal-imgStore">
				 <a href="#">{{ HTML::image('assets/img/apple.png','',array('class' => '')) }}</a>
				 <a href="#">{{ HTML::image('assets/img/google.png','',array('class' => 'Header-image')) }}</a>
				</figure> -->
			</div>
		</section>
		
		<section class="RequestDelivery">
			<article class="RequestDelivery-container">
				<div class="RequestDelivery-content">
					<h2 class="RequestDelivery-title">¿Qué es DeliveryGuy?</h2>
					<p class="RequestDelivery-description">DeliveryGuy es una aplicación Móvil que ayuda a conectar negocios con consumidores, para facilitar y agilizar el proceso de delivery. Al poner una orden a traves de la aplicación, los negocios tendran acceso immediato a los conductores disponibles en el área, quienes trabajan de manera independiente con nosotros.</p>
				</div>
				<figure class="RequestDelivery-imageContainer">
					{{ HTML::image('assets/img/imagen.png','',array('class' => 'RequestDelivery-image')) }}
				</figure>
					
			</article>
			
		</section>


		<section class="TrackingDelivery">
			
			<article class="TrackingDelivery-article">
				<div id="map_canvas" ></div>	

				<div class="TrackingDelivery-content">
					<h2 class="TrackingDelivery-title">Sigue y Verifica tus Deliverys</h2>
					<p class="TrackingDelivery-description">Sientete cómodo al momento de pedir tus delivery's. 
					Desde la comodidad de tu casa, oficina o cualquier otro lugar en donde te encuentres, todo al alcanse de tus manos, DeliveryGuyApp  </p>
				</div>
			</article>			
		</section>

	
		<section class="ReceiveDelivery">
			<article class="ReceiveDelivery-article">
				
				<div class="ReceiveDelivery-content">
					<h2 class="ReceiveDelivery-title">Tu Delivery a la Puerta de tu casa</h2>
					<p class="ReceiveDelivery-description">
						Recibe tus Pedidos de delivery en la puerta de tu casa, mas fácil y accesible imposible.
					</p>
				</div>
				<figure class="ReceiveDelivery-imageContainer">
					{{ HTML::image('assets/img/deliveryguy.png','',array('class' => 'ReceiveDelivery-image')) }}
				</figure>
			</article>
		</section>

		<footer class="Footer">
			<div class="Footer-containerDes">
				<p class="Footer-title"><a class="Footer-link" href="">Quienes Somos |</a></p>
				<p class="Footer-title"><a class="Footer-link" href="">Ayuda |</a></p>
				<p class="Footer-title"><a class="Footer-link" href="">Preguntas Frecuentes |</a></p>
				<p class="Footer-title"><a class="Footer-link" href="">Política de Seguridad |</a></p>
				<p class="Footer-title"><a class="Footer-link" href="">Desarrollo |</a></p>
				<p class="Footer-title"><a class="Footer-link" href="">Trabajo </a></p>
				<br>
				<p class="Footer-corporation"><a href="" class="Footer-link"> Ⓒ DeliveryGuyApp 2014</a> </p>

			</div>
			<div class="Footer-networkContainer">
				<p class="Footer-title "><a href="" class="Footer-network icon-google"></a></p>
				<p class="Footer-title "><a href="" class="Footer-network icon-linkedin"></a></p>
				<p class="Footer-title "><a href="" class="Footer-network icon-twitter"></a></p>
				<p class="Footer-title "><a href="" class="Footer-network icon-facebook"></a></p>
			</div>

			
		</footer>

	</body>
	   <script type="text/javascript">
		    function initialize() {
		        var marcador=null;
		        var mapa = new google.maps.Map(document.getElementById("map_canvas"),
		            {
		                center: new google.maps.LatLng(25.794327247836158, -80.20522713661194),
		                zoom: 16,
		                mapTypeId: google.maps.MapTypeId.ROADMAP,
		                scrollwheel: false 
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