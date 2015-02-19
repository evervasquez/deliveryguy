<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>..:DeliveryGuy:..</title>
	<!-- <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="Delivery Guy App es una poderosa herramienta de trabajo que facilita y permite de manera directa la comunicación entre el restaurante y cientos de mensajeros en el área">
	<!-- <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'> -->

	{{ HTML::style('assets/css/estilos.css'); }}
	{{ HTML::style('assets/css/font-awesome.css'); }}

</head>

	<div class="MenuSmart is-active">
		<div class="MenuSmart-bottons">
			<button class="MenuSmart-button is-active icon-menu" id="showMenu"></button>
		</div>
		<ul class="MainMenuu " id="Menu">
			<p class="MainMenuu-title">DeliveryGuy</p>
			<button class="MainMenuu-btnClose icon-close" id="hideMenu"></button>
			<!-- <li class="MainMenuu-Separ"></li> -->
			<!-- <figure class="MainMenuu-logoCont">
				{{ HTML::image('assets/img/logo.png','',array('class' => 'MainMenuu-logo', 'width'=>'70px', 'height' => '70px')) }}
			</figure> -->
			<li class="MainMenuu-item Item-register"><a href="#" class="MainMenuu-link link-register">Registrar</a></li>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Login</a></li>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Preguntas Frecuentes</a></li>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Ayuda</a></li>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Decargar</a></li>
			<li class="MainMenuu-item item-button img-download">
			<span><a href="#">{{ HTML::image('assets/img/apple.png','',array('class' => '')) }} </a></span>

			</li>
			<li class="MainMenuu-item item-button img-download">


			<span><a href="#">{{ HTML::image('assets/img/google.png','',array('class' => '')) }}</a></span>
			</li>
		</ul>
	</div>

	<div class="Body-overlay">
	<section class="OLRegister">
		<h2 class="OLRegister-title">Register</h2>
		<a href="" class="OLRegister-close icon-close" ></a>
		<article class="OLRegister-container">
			<div class="OLRegister-formContainer">
				<form action="" class="OLRegister-form">

					<input class="OLRegister-input" autofocus="true" placeholder="Nombre de Empresa" type="text"/>
					<input class="OLRegister-input" placeholder="Dirección" type="text"/>
					<input class="OLRegister-input" placeholder="Teléfono" type="tel"/>
					<input class="OLRegister-input" placeholder="Email" type="email"/>
					<button class="OLRegister-cancel">Cancelar</button>
					<button class="OLRegister-send">Enviar</button>
				</form>
			</div>
			<div class="OLRegister-network">
				<p class="OLRegister-facebook"><a class="OLRegister-facebookLink " href=""><span class="OLRegister-icon icon-facebook "></span>Registrarse con Facebook</a></p>
				<p class="OLRegister-google"><a class="OLRegister-googleLink " href=""><span class="OLRegister-icon icon-google "></span>Registrarse con Google</a></p>
				<p class="OLRegister-twitter"><a class="OLRegister-twitterLink " href=""><span class="OLRegister-icon icon-twitter "></span>Registrarse con Twitter</a></p>

			</div>
		</article>
	</section>

</div>
<div class="bodyContainer " id="bodyContainer">
	<div class="SmartOverlay"></div>
	<header class="Header">
	  	<figure class="Header-containerImage">
			<a clsss="Header-logoLink" href="#">

			{{ HTML::image('assets/img/logoOficial.png','',array('class' => 'Header-image')) }}
			</a>
		</figure>

		<nav class="MainMenu">
			<ul class="MainMenu-list">

					<li class="MainMenu-item MainMenu-itemCont"><a class="MainMenu-link" href="">Ayuda</a></li>
					<li class="MainMenu-item MainMenu-itemCont"><a class="MainMenu-link" href="">Preguntas frecuentes</a>|</li>
					{{--<li class="MainMenu-item MainMenu-itemCont"><a class="MainMenu-link click-register" href="">Registrar</a>|</li>--}}
					<li class="MainMenu-item MainMenu-itemCont"><a class="MainMenu-link" href="{{route('sign-up')}}">Registrar</a>|</li>

					<li class="MainMenu-item MainMenu-itemCont "><a class="MainMenu-link" href="{{route('sign-in')}}">Login </a> |</li>
					

			</ul>
				<span><a href="#">{{ HTML::image('assets/img/apple.png','',array('class' => 'MainMenu-appStore')) }} </a></span>
				<span><a href="#">{{ HTML::image('assets/img/google.png','',array('class' => 'MainMenu-google')) }}</a></span>

		</nav>
	</header>

	@section('content')
		<section class="InfoPrincipal">
					<div class="InfoPrincipa-phone">
						<firgure class="InfoPrincipal-containerImage">
						 {{ HTML::image('assets/img/phone.png','',array('class' => 'InfoPrincipal-image')) }}
						</firgure>
					</div>
				<div class="InfoPrincipal-containerDescription ">
						 <figure class="InfoPrincipal-logoc none">
							{{ HTML::image('assets/img/logo_deliveryguy.png','',array('class' => 'InfoPrincipal-logo', 'width'=>'70px', 'height' => '70px')) }}
				 </figure>
				<p class="InfoPrincipal-title "><span class="size-title">Te Presentamos</span> <br><span class="InfoPrincipal-marca">DeliveryGuy !</span></p>
				<h1 class="InfoPrincipal-subtitle">DeliveryGuy es una poderosa herramienta de trabajo que facilita y permite de manera directa la comunicación entre el restaurante y cientos de mensajeros en el área.<br><a class="InfoPrincipal-more" href="">Leer Mas...</a></h1>

				<div class="InfoPrincipal-assoContainer">
					<p class="InfoPrincipal-linkContainer "><a href="" class="InfoPrincipal-link "><span class="icon-food"></span class="Asociado">Asociate como Restaurant</a></p>
					<p class="InfoPrincipal-linkContainer "><a href="" class="InfoPrincipal-link"><span class="icon-truck"></span class="Asociado">Asociate como Repartidor</a></p>
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

					<h2 class="RequestDelivery-title">¿Tienes un restaurante?</h2>

					<div class="left">
						<p class="RequestDelivery-description">
							- Conectate a la mejor red de repartidores en tu área a cualquier hora, todos los dias del año. <br>
							- Agiliza tus entregas con la tecnología móvil en tiempo real.
							<br>
							- Aumenta el número de ordenes sin elevar tus gatos.
						</p>
					</div>
					<p class="InfoPrincipal-linkContainer link-info link-derecho"><a href="" class="InfoPrincipal-link  linkTable"><span class="icon-food"></span>Asociate como Restaurant</a></p>

				<!-- 	<h2 class="RequestDelivery-title">¿Qué es DeliveryGuy?</h2>
					<p class="RequestDelivery-description">DeliveryGuy es una aplicación Móvil que ayuda a conectar negocios con consumidores, para facilitar y agilizar el proceso de delivery. Al poner una orden a traves de la aplicación, los negocios tendran acceso immediato a los conductores disponibles en el área, quienes trabajan de manera independiente con nosotros.</p> -->
				</div>

					<figure class="RequestDelivery-imageContainer">
						{{ HTML::image('assets/img/img_restaurant.jpg','',array('class' => 'RequestDelivery-image')) }}
					</figure>

			</article>

		</section>


		<section class="TrackingDelivery">

			<article class="TrackingDelivery-article">
				<div id="map_canvas" ></div>

				<div class="TrackingDelivery-content">
					<h2 class="TrackingDelivery-title">Sigue y Verifica tus Deliverys</h2>
					<p class="TrackingDelivery-description ">Sientete cómodo al momento de pedir tus delivery's.
					Desde la comodidad de tu casa, oficina o cualquier otro lugar en donde te encuentres, todo al alcanse de tus manos, DeliveryGuyApp  </p>
				</div>
			</article>
		</section>

		<section class="ReceiveDelivery">
			<article class="ReceiveDelivery-article">

				<div class="ReceiveDelivery-content">
					<h2 class="ReceiveDelivery-title">Tu Delivery a la Puerta de tu casa</h2>
					<p class="ReceiveDelivery-description left">
						Recibe tus Pedidos de delivery en la puerta de tu casa, mas fácil y accesible imposible.
					</p>
				</div>
				<figure class="ReceiveDelivery-imageContainer">
					{{ HTML::image('assets/img/deliveryguy.png','',array('class' => 'ReceiveDelivery-image')) }}
				</figure>
			</article>
		</section>
	@show
<footer class="Footer">
	<div class="Footer-containerDes">
		<p class="Footer-title"><a class="Footer-link" href="">Quienes Somos |</a></p>
		<p class="Footer-title"><a class="Footer-link" href="">Ayuda |</a></p>
		<p class="Footer-title"><a class="Footer-link" href="">Preguntas Frecuentes |</a></p>
		<p class="Footer-title"><a class="Footer-link" href="">Política de Seguridad |</a></p>
		<p class="Footer-title"><a class="Footer-link" href="">Desarrollo |</a></p>
		<p class="Footer-title"><a class="Footer-link" href="">Trabajo </a></p>
		<br>

	</div>
	<div class="Footer-networkContainer">
		<p class="Footer-title "><a href="" class="Footer-network icon-google"></a></p>
		<p class="Footer-title "><a href="" class="Footer-network icon-linkedin"></a></p>
		<p class="Footer-title "><a href="" class="Footer-network icon-twitter"></a></p>
		<p class="Footer-title "><a href="" class="Footer-network icon-facebook"></a></p>
	</div>
</footer>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
{{ HTML::script('assets/js/utils.js') }}
<!-- {{ HTML::script('assets/js/deliveryguy.js') }} -->
<!-- {{ HTML::script('assets/js/hammer.min.js') }} -->

   <script type="text/javascript">
    function initialize() {
        var mapa = new google.maps.Map(document.getElementById("map_canvas"),
            {
                center: new google.maps.LatLng(25.794327247836158, -80.20522713661194),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                navigationControl: false,
                scrollwheel: false,
			    mapTypeControl: false,
			    scaleControl: false,
			    draggable: false,
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



	 //body.on('panright',showMenu);
	 //body.on('panleft',hideMenu);

	</script>
</html>