// ********AGREGADO DE MENU DESPLEGABLE PARA SMARTPHONE
var $buttonShowMenu = document.getElementById('showMenu');
var $buttonHideMenu = document.getElementById('hideMenu');
var $menu = document.getElementById('Menu');

var $body= document.querySelector('body');
var $bodyContainer= document.getElementById('bodyContainer');

//var body= new Hammer($body);

var showMenu = function(){
    // console.log("muestra menu");
    $buttonShowMenu.classList.remove('is-active');
    $buttonHideMenu.classList.add('is-active');
    $menu.classList.add('is-active');
}

var hideMenu = function(){
    $buttonShowMenu.classList.add('is-active');
    $buttonHideMenu.classList.remove('is-active');
    $menu.classList.remove('is-active');
}

$buttonShowMenu.addEventListener("click", showMenu);
$buttonHideMenu.addEventListener("click", hideMenu);
$bodyContainer.addEventListener("click", hideMenu);
// END********AGREGADO DE MENU DESPLEGABLE PARA SMARTPHONE




var $linkRegister__restaurant=$('#register__restaurant'),
	$linkRegister__employee=$('#register__employee'),
	$linkStyleRest=$('.register__link--jsRest'),
	$linkStyleEmployee=$('.register__link--jsEmployee'),
	$register__resta=$('.register__resta'),
    $register__form=$('.register__form'),
    $register__itemRes=$('.register__itemRes'),
    $register__itemEmplo=$('.register__itemEmplo');





function tab_employee()
{
    // $overlay.css('display', 'block');
    $register__form.fadeIn(0);
    $register__resta.fadeOut(0);
    $linkStyleRest.css('background', '#e84207');
    $linkStyleRest.css('color', 'white');
    $linkStyleEmployee.css('background-color', '#ffffff');
    $linkStyleEmployee.css('color', '#1fa392');
    $register__itemRes.css('width', '90%');
    $register__itemEmplo.css('width', '100%');
    

   	// $bodyGeneral.css('position', 'relative');

    return false;
}
 
function tab_restaurant()
{
    // $overlay.css('display', 'block');
    $register__resta.fadeIn(0);
    $register__form.fadeOut(0);
    $linkStyleRest.css('background', 'white');
    $linkStyleRest.css('color', '#1fa392');
    $linkStyleEmployee.css('background-color', '#e84207');
    $linkStyleEmployee.css('color', 'white');
    $register__itemRes.css('width', '100%');
    $register__itemEmplo.css('width', '90%');

   	// $bodyGeneral.css('position', 'relative');

    return false;
}

$linkRegister__employee.click(tab_employee);
$linkRegister__restaurant.click(tab_restaurant);

if (screen.width <= 824) {
    $(document).ready(function($){

    $linkRegister__employee.click(function(event) {
            $register__itemRes.css('width', '49%');
            $register__itemEmplo.css('width', '49%');

        }); 

    $linkRegister__restaurant.click(function(event) {
            $register__itemRes.css('width', '49%');
            $register__itemEmplo.css('width', '49%');

        });
    });
}
