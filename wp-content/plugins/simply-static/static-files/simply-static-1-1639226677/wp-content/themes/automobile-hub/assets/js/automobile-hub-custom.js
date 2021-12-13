/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

// ===== Search Box ==== 
jQuery(function($){
  "use strict";
  jQuery('.main-menu > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},  
    speed:       'fast'
  });

    jQuery('.search-box button').click(function(){
    jQuery(".search_outer").toggle();
  });

  jQuery('.search_inner input.search-field').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.search_inner button.search-submit').focus();
    }
  });

  jQuery('.search_inner .search-submit').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('button.search_btn').focus();
    }
  });
});

// ===== Mobile responsive Menu ==== 
function automobile_hub_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function automobile_hub_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

// ===== Menu Scroll ==== 
// jQuery(function($){
//     $(window).scroll(function(){
//     var scrollTop = $(window).scrollTop();
//     if( scrollTop > 100 ){
//       $('.menubar').addClass('scrolled');
//     }else{
//       $('.menubar').removeClass('scrolled');
//     }
//       $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
//   });
// });

// ===== Scroll to Top ==== 
jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

function automobile_hub_text_copyied() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

jQuery('document').ready(function($){
  setTimeout(function () {
  jQuery(".loader").fadeOut("slow");
  },1000);
});