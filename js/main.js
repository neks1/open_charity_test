(function($) {
  Drupal.behaviors.membersSlider = {
    attach: function (context, settings) {
      var $sliderSettings = {
        infinite: true,
        slidesToShow: 5,
        dots: true,
        arrows: false,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
          }
        }]
      };

      $('.member-content .view-content').slick($sliderSettings);
    }
  };

  Drupal.behaviors.blogSlider = {
    attach: function (context, settings) {
      var $sliderSettings = {
        infinite: true,
        slidesToShow: 4,
        dots: false,
        arrows: true,
        responsive: [{
        breakpoint: 992,
          settings: {
            arrows: false,
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 640,
          settings: {
            arrows: false,
            slidesToShow: 1,
          }
        }]
      };

      $('.blog-content .view-content').slick($sliderSettings);
    }
  };

  Drupal.behaviors.stickyHeader = {
    attach: function (context, settings) {
      var $thisObj = this;
      $thisObj.sticker('.header', '.header-wrapper', context);
    },
    getElementHeight: function(el, context) {
      var $elHeight = $(el, context).innerHeight();
      return $elHeight;
    },
    sticker: function(el, setHeight, context) {
      var $thisObj      = this;
      var $headerHeight = $thisObj.getElementHeight(el, context);
      $(setHeight).css('height', $headerHeight);

      $(window).resize(function(){
        $headerHeight = $thisObj.getElementHeight(el, context);
        $(setHeight).css('height', $headerHeight);
      });

      $(window).scroll(function(){
        var $winTop = $(window).scrollTop();
        if($winTop >= 1){
          $("body").addClass("sticky-header");
        } else {
          $("body").removeClass("sticky-header");
        }
      });
    }
  };

  Drupal.behaviors.scrollMenu = {
    attach: function (context, settings) {
      var $root = $('html, body');
      $('.main-menu a:not(.button)').click(function() {
        var headerHeight = $('.header').innerHeight();
        $root.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top - headerHeight
        }, 500);
        return false;
      });
    }
  }

  Drupal.behaviors.respMenu = {
    attach: function (context, settings) {
      $('.header .main-menu .content > ul.menu', context).slicknav({
        prependTo: '.header .main-menu',
        label: ''
      });
    }
  };


})(jQuery);
