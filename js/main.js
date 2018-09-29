function initialize(lat, lng, lat1, lng1) {
    var latMap = (parseFloat(lat) + parseFloat(lat1)) / 2;
    var lngMap = (parseFloat(lng) + parseFloat(lng1)) / 2;
    var myLatlng = new google.maps.LatLng(latMap, lngMap);
    var mapOptions = {
        zoom: 8,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var image = '/img/map-icon.png';
    var marker;
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        map: map,
        icon: image,
        title: ''
    });
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat1, lng1),
        map: map,
        icon: image,
        title: ''
    });
}

function initializeDon() {
    var items = $('.contacts-i');
    var locations = [];
    for (var i=0; i<items.length; i++) {
        locations.push([
            $(items[i]).data('name'),
            $(items[i]).data('lat'),
            $(items[i]).data('lng'),
            $(items[i]).data('address'),
            $(items[i]).data('phone'),
            $(items[i]).data('schedule')
        ]);
    }

    var map = new google.maps.Map(document.getElementById('map-don'), {
      zoom: 6,
      center: new google.maps.LatLng(48.5505313,30.6270735)
    });

    var infowindow = new google.maps.InfoWindow;

    var marker;
    var image = '/img/map-icon.png';
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: image
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0] + '<br/>' + locations[i][3] + '<br/>' + locations[i][4] + '<br/>' + locations[i][5]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

function screenClass() {
    if($(window).innerWidth() > 767) {
      $('.header__cab').hover(function () {
          $('.header__cab__show').stop().fadeIn(600);
      }, function () {
          $('.header__cab__show').stop().fadeOut(600);
      });

    $('.nav-h').hover(function () {
        $('.nav__drop').stop().fadeIn(600);
        $('.nav__arrow').addClass('active');
    }, function () {
        $('.nav__drop').stop().fadeOut(600);
        $('.nav__arrow').removeClass('active');
    });

    } else {
      $('.header__cab').on('click', function () {
        if ($('.header__cab').hasClass('active')) {
          $(this).removeClass('active');
          $('.header__cab__show').stop().fadeOut(300);
        } else {
          $('.header__phones__down').stop().fadeOut(300);
          $('.header__phones__show').stop().removeClass('active');
          $('.header__adress__down').stop().stop().fadeOut(300);
          $('.header__adress__show').stop().removeClass('active');          

          $(this).addClass('active');
          $('.header__cab__show').stop().fadeIn(600);
        }
      });  

      $('.cat-l__title').on('click', function () {
        if ($(this).next('.cat-list').is(':visible')) {
          $(this).next('.cat-list').slideUp();
        }
        else{
          $(this).next('.cat-list').slideDown();
        }
      });  

      $('.header__phones__show').on('click', function () {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $('.header__phones__down').stop().fadeOut(600);
        }
        else{
          $('.header__adress__down').stop().fadeOut(300);
          $('.header__adress__show').stop().removeClass('active');
          $('.header__cab__show').stop().fadeOut(300);
          $('.header__cab').stop().removeClass('active');

          $(this).addClass('active');
          $('.header__phones__down').stop().fadeIn(600);
        }
      });    

      $('.header__adress__show').on('click', function () {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $('.header__adress__down').stop().fadeOut(600);
        }
        else{
          $('.header__phones__down').stop().fadeOut(300);
          $('.header__phones__show').removeClass('active');
          $('.header__cab__show').stop().fadeOut(300);
          $('.header__cab').removeClass('active');     

          $(this).addClass('active');
          $('.header__adress__down').stop().fadeIn(600);
        }
      });   

		$(".show-menu").bind('click',function (e) {
      //$('.show-menu').on('click', function (e) {
      	 e.preventDefault();
        if ($(this).next('.nav ul').is(':visible')) {
          $(this).next('.nav ul').slideUp();
          $(".nav__drop").stop().fadeOut();
          $('.search').stop().fadeOut();
        }
        else{
          $(this).next('.nav ul').slideDown();
        }
      });  

      $('.nav__arrow').on('click', function () {
        $('.search').stop().fadeOut();
        $(".nav__drop").fadeIn();
      });  

      $('.nav__back').on('click', function () {
        $('.nav__drop').stop().fadeOut();
      });  
    }
}    


$(window).bind('resize',function(){
    screenClass();
});

jQuery(document).ready(function ($) {
    screenClass();  
    $(".phone_mask").mask("+38 (999) 999-99-99");

    $(".b-mhalf__i").matchHeight();
    $(".art__i").matchHeight();
    $(".cat-i").matchHeight();
    $(".lk-m-item").matchHeight();
    $(".don-three__i").matchHeight();
    $(".m-cat__i").matchHeight();
    $(".m-cat__i__title").matchHeight();
    
    $('.brands').owlCarousel({
      items:5,  
      loop:true,
      margin:20,
      nav:true,
      dots:true,
      navText:false,
      responsive:{
        0:{
            items:2,
            nav:true,
            center:true,
            autoWidth:true
        },
        480:{
          items:2
        },        
        640:{
          items:3
        },
        767:{
          items:5
        }

    }
    });

    $('#slider').owlCarousel({
      items: 1,
      singleItem: true,
      responsive: true,
      loop:true,
      responsiveRefreshRate: 1,
      nav:true,
      dots:true,
      navText:false,
      autoplay: true,
      autoplaySpeed:5000,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
    });


    $('a[href^="#"]').bind('click.smoothscroll',function (e) {
      e.preventDefault();

      var target = this.hash,
          $target = $(target);

      if($target.length>0)
      {
        $('html, body').stop().animate({
          'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
          window.location.hash = target;
        });
      }
    });


    $('.jqui-lang > select').selectmenu({
      classes: {
        "ui-selectmenu-menu": "highlight"
      }
    });


    $('.search-show').on('click', function () {
      if ($('.search').is(':visible')) {
          $('.search').stop().fadeOut();
      } else {
          $('.search').stop().fadeIn();
      }
    });

    $('.show-mess').on('click', function () {
      if ($('.hiden-mess').is(':visible')) {
        $('.hiden-mess').stop().fadeOut();
      } else {
        $('.show-mess').stop().fadeOut();
        $('.hiden-mess').stop().fadeIn();
      }
    });    

    var map_div = $("#map");
    if (map_div.length) {
        initialize(map_div.data('lat'), map_div.data('lng'), map_div.data('lat1'), map_div.data('lng1'));
    }

    var map_d = $("#map-don");
    if (map_d.length) {
      initializeDon();
    }

    $('.overlayElementTrigger').on('click', function () {
        if ($('.overlay-forms').is(':visible')) {
            $('.of-form').stop().fadeOut();
        } else {
            $('.overlay-forms').stop().fadeIn();
        }

        $('.' + $(this).data('selector')).stop().fadeIn();
    });

    $('.form-overlay').on('click', function () {
        $('.of-form').stop().fadeOut();
        $('.overlay-forms').stop().fadeOut();
        if ($('.popup.youtube').length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    $('.of-close').on('click', function () {
        $('.of-form').stop().fadeOut();
        $('.overlay-forms').stop().fadeOut();
        if ($('.popup.youtube').length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    var footerHeight = $("footer").outerHeight();
    $("footer").css({'margin-top': -footerHeight});
    $(".clearfix-footer").css({'height': footerHeight});

    $(".acrdn-item-head").click(function (e) {
        e.preventDefault();
        if (!($(this).parent().hasClass("opened"))) {
            $(".acrdn-item-body").slideUp();
            $(".acrdn-item").removeClass("opened");
            $(this).parent().children(".acrdn-item-body").slideDown();
            $(this).parent().addClass("opened");
        } else {
            $(".acrdn-item-body").slideUp();
            $(this).parent().removeClass("opened");
        }
    });



    if ($(".slider").length) {
      $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: false,
        cssEase: 'linear',
        fade: true,
        asNavFor: '.slider-nav',
        prevArrow: $('.prev'),
        nextArrow: $('.next')
      });

      $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider',
        vertical: true,
        dots: false,
        focusOnSelect: true,
        loop: false,
        arrows: false,
        dots: false,
        infinite: false,
      });

    }

    $('.jqui-select > select').selectmenu();


    $('.same').owlCarousel({
      items:4,  
      loop:true,
      margin:30,
      nav:true,
      dots:true,
      navText:false,
      responsive:{
        0:{
            items:1,
        },
        480:{
          items:2
        },        
        768:{
          items:4
        }

    }      
    });

    $('.to-top').click(function () { 
      $('body, html').animate({
        scrollTop: 0
      }, 1500);
    }); 


    /*============== mobile ==============*/
    $(".show-m-menu").click(function (e) {
      e.preventDefault();
      $(".nav").fadeIn();
    });

    $(".menu-close_1").click(function (e) {
      e.preventDefault();
      $(".nav").fadeOut();
    });
    $(".menu-close_2").click(function (e) {
      e.preventDefault();
      $(".nav__drop").removeClass("active");
    });

    $(".nav__arrow").click(function (e) {
      e.preventDefault();
      $(".nav__drop").addClass("active");
    });    
});