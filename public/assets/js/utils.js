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