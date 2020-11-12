

(function ($) {

    'use strict';
    //Menu
    $('.navbar-toggle').on('click', function (event) {
        $(this).toggleClass('open');
        $('#navigation').slideToggle(400);
    });
    
    $('.navigation-menu>li').slice(-2).addClass('last-elements');
    
    $('.menu-arrow,.submenu-arrow').on('click', function (e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
        }
    });
    
    // Smooth scroll 
    $('.navbar-nav a, .scrollbtn').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
        }, 3000, 'easeInOutExpo');
        event.preventDefault();
    });
    
	// Add scroll class
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".sticky").addClass("nav-sticky");
        } else {
            $(".sticky").removeClass("nav-sticky");
        }
    });

	//Scrollspy
    $(".navbar-nav").scrollspy({
        offset: 20
    });
    
	//owlCarousel
    $("#client-testi").owlCarousel({
        autoPlay: 3000,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true,
        items: 1,
    });

    $("form").submit(function(e){
        e.preventDefault(); 
  
        let formmattedData = $(this).serialize();


        $.post('layouts/php/contact.php', formmattedData, function(data){
            console.log(data);
        }).done(function(){
            $('.form-control').val('');
        });
    })

})(jQuery)