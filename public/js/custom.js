

$('.main-slide').slick({
    infinite: true,
    dots: true,
    arrows : false,
    autoplay: true,
    autoplaySpeed: 7000,
   
  });


  $('.event-slider').slick({
    infinite: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 7000,
   
  });


  jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
      var scroll = jQuery(window).scrollTop();
      if (scroll >= 100) {
        jQuery("#header").addClass("sticky");
      } else {
        jQuery("#header").removeClass("sticky");
      }
     
    });
  });



    
// hamburger menu //

$(function() { //run when the DOM is ready
  $(".top__menu__bar").click(function() { //use a class, since your ID gets mangled
      $(this).toggleClass("active"); //add the class to the clicked element
      $('.sub-menu').toggleClass("open");
  });
});

