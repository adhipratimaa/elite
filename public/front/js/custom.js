$(document).ready(function() {
    $('.main-slide').slick({

        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        autoplay: true,
        fade: true,
        autoplaySpeed: 7000,
        speed: 1000
    });
});


$(document).ready(function() {
    $('.testimonial-slider').slick({

        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        autoplay: true,
        fade: false,
        autoplaySpeed: 7000,
        speed: 1000
    });
});



$(document).ready(function() {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 140) {
        // $(".navbar").addClass("sticky");
        $("#header-parent").addClass("sticky");
      } else {
        // $(".navbar").removeClass("sticky");
        $("#header-parent").removeClass("sticky");
      }
      if (scroll > 50) {
        $(".scroll-to-top").fadeIn();
      } else {
        $(".scroll-to-top").fadeOut();
      }
    });
  });


    
// hamburger menu //

$(function() { //run when the DOM is ready
    $(".top-menu-bar").click(function() { //use a class, since your ID gets mangled
        $(this).toggleClass("active"); //add the class to the clicked element
        $('#main-nav').toggleClass("open");
    });
});



$(document).ready(function() {
    $(".sub-menu-parent a").click(function() {
            var link = $(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;

            closest_ul.find("ul").slideUp(function() {
                    if (++count == closest_ul.find("ul").length)
                            parallel_active_links.removeClass("active");
            });

            if (!link_status) {
                    closest_li.children("ul").slideDown();
                    closest_li.addClass("active");
            }
    })
})





$(document).ready(function() {
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 140) {
      // $(".navbar").addClass("sticky");
      $(".get-info-wrapp").addClass("scrolled");
    } else {
      // $(".navbar").removeClass("sticky");
      $(".get-info-wrapp").removeClass("scrolled");
    }
    if (scroll > 50) {
      $(".scroll-to-top").fadeIn();
    } else {
      $(".scroll-to-top").fadeOut();
    }
  });
});