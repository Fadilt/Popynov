$(document).ready(function(){
    $('.parallax').parallax();
    $('.carousel').carousel();
    //$('.carousel').carousel('numVisible')
    $('a[href*="#"]').on('click', function(e) {
    e.preventDefault()
    
    $('html, body').animate(
        {
        scrollTop: $($(this).attr('href')).offset().top,
        },
        800,
        'linear'
    )
    })

    $(function () {
        $(document).scroll(function () {
            var $nav = $(".nav");
            var $logo = $(".nav").children(".logoEmplacement");
            var $logoLeft = $(".nav").children(".textNav").children(".logoLeft");

            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            $logo.toggleClass('hideLogo', $(this).scrollTop() > $nav.height());
            $logoLeft.toggleClass('showLogoLeft', $(this).scrollTop() > $nav.height());
        });
    });

    var instance = M.Carousel.init({
        fullWidth: true
      });
    
      // Or with jQuery
    
      $('.carousel.carousel-slider').carousel({

        indicators: true
      });
      
});
