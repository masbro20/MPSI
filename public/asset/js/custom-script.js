/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
 $(document).ready(function(){
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
    if ($(window).scrollTop() > 107) {
      $('#nav_bar').addClass('navbar-fixed');
      $('#banner').hide();
      $('#banners').show();
    }
    if ($(window).scrollTop() < 108) {
      $('#nav_bar').removeClass('navbar-fixed');
      $('#banner').show();
      $('#banners').hide();
    }
  });

  //time picker added n_abedi
  $('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: 'OK',
    autoclose: false,
    vibrate: true // vibrate the device when dragging clock hand
  });
  });