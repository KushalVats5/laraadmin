(function ($) {
  "use strict";
  // Preloader (if the #preloader div exists)
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Smooth scroll for the navigation and links with .scrollto classes
  $('.main-nav a, .mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (! $('#header').hasClass('header-scrolled')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.main-nav, .mobile-nav').length) {
          $('.main-nav .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.main-nav, .mobile-nav');
  var main_nav_height = $('#header').outerHeight();

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop();

    nav_sections.each(function() {
      var top = $(this).offset().top - main_nav_height,
          bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        main_nav.find('li').removeClass('active');
        main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('active');
      }
    });
  });

  // jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  // Porfolio isotope and filter
  $(window).on('load', function () {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
    });
    $('#portfolio-flters li').on( 'click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');

      portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  //  Login script
    $('#loginForm').on("submit", function(e){
        e.preventDefault();
        var loginForm = $(this);
        var formData = loginForm.serialize();
        $.ajax({
            url:'/login',
            type:'POST',
            data:formData,
            dataType: "json",
            success:function(response){
                if(response.success){
                    $('.alert-dismissible').addClass('alert-success');
                    $('.alert-dismissible').show('slow');
                    $('.alert-dismissible').append('<section><p><i class="fa fa-warning"> '+ response.message+'</p></section>');
                    setTimeout(() => {
                        $('.alert-dismissible').html('');
                        $('.alert-dismissible').removeClass('alert-success');
                        $('.alert-dismissible').hide('slow');
                        window.location.href = site_url+"/"+response.redirect_to;
                    }, 5000);
                    // window.location.href = site_url+"/"+response.redirect_to;
                }else{
                    $('.alert-dismissible').addClass('alert-danger');
                    $('.alert-dismissible').show('slow');
                    var obj = response.error;
                        $.each( obj, function( key, value ) {
                        // alert( key + ": " + value );
                        $('.alert-dismissible').append('<section><p><i class="fa fa-warning"> '+ value+'</p></section>');
                    });
                    setTimeout(() => {
                        $('.alert-dismissible').html('');
                        $('.alert-dismissible').removeClass('alert-danger');
                        $('.alert-dismissible').show('hide');
                        // window.location.href = site_url+"/"+response.redirect_to;
                    }, 5000);
                }
            },
            error: function (response) {
                console.log('Error! :'+response);
                // console.log(response.error);
            }
        });
    });
})(jQuery);

$("#registerForm").on("submit", function(e) {
    e.preventDefault();
    var registerForm = $(this);
        var formData = registerForm.serialize();
        $.ajax({
            url:'/register',
            type:'POST',
            data:formData,
            dataType: "json",
            success:function(response){
                if(response.success){
                    $('.alert-dismissible').addClass('alert-success');
                    $('.alert-dismissible').show('slow');
                    $('.alert-dismissible').append('<section><p><i class="fa fa-warning"> '+ response.message+'</p></section>');
                    setTimeout(() => {
                        $('.alert-dismissible').html('');
                        $('.alert-dismissible').removeClass('alert-success');
                        $('.alert-dismissible').hide('slow');
                        window.location.href = site_url+"/"+response.redirect_to;
                    }, 5000);
                    // window.location.href = site_url+"/"+response.redirect_to;
                }else{
                    $('.alert-dismissible').addClass('alert-danger');
                    $('.alert-dismissible').show('slow');
                    var obj = response.error;
                        $.each( obj, function( key, value ) {
                        // alert( key + ": " + value );
                        $('.alert-dismissible').append('<section><p><i class="fa fa-warning"> '+ value+'</p></section>');
                    });
                    setTimeout(() => {
                        $('.alert-dismissible').html('');
                        $('.alert-dismissible').removeClass('alert-danger');
                        $('.alert-dismissible').show('hide');
                        // window.location.href = site_url+"/"+response.redirect_to;
                    }, 5000);
                }
            },
            error: function (response) {
                console.log('Error! :'+response);
                // console.log(response.error);
            }
        });
});

$(function () {
    $('.navbar-toggle-sidebar').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
    });

    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
        $('.search-input').focus();
    });
});


(function ($) {
    "use strict";
    $('#printInvoice').click(function(){
        // Popup($('.invoice')[0].outerHTML);
        // function Popup(data)
        // {
        //     window.print();
        //     return true;
        // }
        $("#invoice").show();
    window.print();
    });


})(jQuery);

