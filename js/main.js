function initialize(lat, lng) {
    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 17,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var image = '/img/map-icon.png';
    var marker = new google.maps.Marker({
        position: myLatlng,
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
            $(items[i]).data('lng')
        ]);
    }

    var map = new google.maps.Map(document.getElementById('map-don'), {
      zoom: 11,
      center: new google.maps.LatLng(50.44,30.55)
    });


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
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

jQuery(document).ready(function ($) {
    $(".phone_mask").mask("(999) 999-99-99");

    $(".b-mhalf__i").matchHeight();
    $(".art__i").matchHeight();
    $(".cat-i").matchHeight();
    $(".lk-m-item").matchHeight();
    $(".don-three__i").matchHeight();
    
    $('.brands').owlCarousel({
      items:5,  
      loop:true,
      margin:20,
      nav:true,
      dots:true,
      navText:false
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

    $('.header__cab').hover(function () {
        $('.header__cab__show').stop().fadeIn(600);
    }, function () {
        $('.header__cab__show').stop().fadeOut(600);
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

    $('.nav-h').hover(function () {
        $('.nav__drop').stop().fadeIn(600);
        $('.nav__arrow').addClass('active');
    }, function () {
        $('.nav__drop').stop().fadeOut(600);
        $('.nav__arrow').removeClass('active');
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
        initialize(map_div.data('lat'), map_div.data('lng'));
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

    $('.show-b').on('click', function () {
      if ($(this).hasClass('active')) {
          $(this).next('.hidden-b').slideUp();
          $(this).removeClass('active');
      }
      else {
          $(this).next('.hidden-b').slideDown();
          $(this).addClass('active');
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


    var slideTov = $(".prod-more");
    slideTov.owlCarousel({
      navigation: true,
      slideSpeed: 300,
      paginationSpeed: 400,
      items: 5,
      responsive: true,
      responsiveRefreshRate: 1,
      pagination: false,
      navigationText: false,
      autoPlay: false,
      loop: false,
      itemsDesktop : [1000,5], 
      itemsDesktopSmall : [767,3], 
      itemsTablet: [480,2], 
      itemsMobile : [360,1]
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
      navText:false
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