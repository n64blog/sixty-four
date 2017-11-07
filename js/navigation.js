jQuery(document).ready(function(){

  var navMenu = jQuery('.menu');

  jQuery('body').append('<div class="overlay"></div>');
  jQuery('.header').append('<div class="menu-toggle">Menu</div>');

  navMenu.addClass('menu--js');

  jQuery('.menu-toggle').click(function(){
    navMenu.toggleClass('menu--js--show');
    jQuery('.overlay').toggleClass('overlay--show');
  });

});
