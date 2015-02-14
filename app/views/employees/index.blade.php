<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Profile Employee</title>
	{{ HTML::style('assets/css/estilos.css'); }}
	{{ HTML::style('assets/css/font-awesome.css'); }}
</head>
<body class="profile-body">
	<!--BEGIN MENU SMARTPHONE-->
	<div class="MenuSmart is-active">
		<div class="MenuSmart-bottons">
			<button class="MenuSmart-button is-active icon-menu" id="showMenu"></button>
		</div>
		<ul class="MainMenuu" id="Menu">
			<p class="MainMenuu-title">Configuracion</p>
			<button class="MainMenuu-btnClose icon-close" id="hideMenu"></button>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Configuracion de Perfil</a></li>
			<li class="MainMenuu-item item-button"><a href="" class="MainMenuu-link">Cambiar Contraseña</a></li>
			<li class="MainMenuu-item item-button"><a href="#" class="MainMenuu-link">Eliminar Cuenta</a></li>
				
		</ul>
	</div>
	<!--END MENU SMARTPHONE-->

	<!-- METODOLOGIA BEM PARA NORMBRAR CLASES http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/ -->
	<div class="contend-notebook">	
		<div class="profile-menu">
				<section class="profile-info">
					<article class="profile-info__container">
					<h2 class="profile-info__title"> Información de Contacto</h2>
					<ul class="profile-info__list">
						<li class="profile-info__item"><a class="profile-info__link" href="" ><i class="profile-info__icon fa fa-cog "></i><span class="profile-info__datos">Configuracion de Perfil</span></a></li>
						<li class="profile-info__item"><a class="profile-info__link" href="" ><i class="profile-info__icon fa fa-unlock-alt  "></i><span class="profile-info__datos">Cambiar Contraseña</span></a></li>
						<li class="profile-info__item"><a class="profile-info__link" href="" ><i class="profile-info__icon fa fa-minus-circle "></i><span class="profile-info__datos">Eliminar Cuenta</span></a></li>
					
					</ul>
				
				</article>
			</section>
		</div>
		<div class="profile-content">
			<section class="profile">
				<article class="profile__container">
					<h2 class="profile__name">Ever Vasquez</h2>
					 <figure class="profile__imgPerfilConteiner">
					 	
					 	{{ HTML::image('assets/img/profile.jpg','',array('class' => 'profile__imgPerfil')) }}
					 	<figcaption class="profile__imgPerfilDescription"></figcaption>
					 </figure> 

					 <figure class="profile__imgMotoConatiner">
					 	{{ HTML::image('assets/img/moto.png','',array('class' => 'profile__imgMoto')) }}
					 </figure>
				</article>	
			</section >
				
			<section class="profile-info">
					<article class="profile-info__container viewhigth">
					<h2 class="profile-info__title"> Información de Contacto</h2>
					<ul class="profile-info__list">
						<li class="profile-info__item"><i class="profile-info__icon fa fa-key fa-lg"></i><span class="profile-info__datos">E0001</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-user "></i><span class="profile-info__datos">Ever Vasquez</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-credit-card"></i><span class="profile-info__datos">93743348784</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-phone "></i><span class="profile-info__datos">976834206</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-envelope"></i><span class="profile-info__datos">eversape@gmail.com</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-map-marker"></i><span class="profile-info__datos">Jr los olvidados de Dios 320</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-transgender-alt"></i><span class="profile-info__datos">Masculino</span></li>
						<li class="profile-info__item"><i class="profile-info__icon fa fa-birthday-cake"></i><span class="profile-info__datos">17-09-1971</span></li>
					</ul>
				
				</article>
			</section>
		</div>
	</div>
	
	<footer class="footer">
		
	</footer>


	{{ HTML::script('assets/js/utils.js') }}
</body>
</html>