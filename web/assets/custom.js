$(document).ready(function(){
    var $nav = $(".nav");
    var $logo = $(".nav").children(".logoEmplacement");
    var $goHead = $(".goHead");
    var $logoLeft = $(".nav").children(".textNav").children(".logoLeft");
    

    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    $goHead.toggleClass('showLogoLeft', $(this).scrollTop() > $nav.height());
    $logo.toggleClass('hideLogo', $(this).scrollTop() > $nav.height());
    $logoLeft.toggleClass('showLogoLeft', $(this).scrollTop() > $nav.height());
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

    $(".goHead").on("click", function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });

    $(function () {
        $(document).scroll(function () {
            var $nav = $(".nav");
            var $goHead = $(".goHead");
            var $logo = $(".nav").children(".logoEmplacement");
            var $logoLeft = $(".nav").children(".textNav").children(".logoLeft");

            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            $goHead.toggleClass('showLogoLeft', $(this).scrollTop() > $nav.height());
            $logo.toggleClass('hideLogo', $(this).scrollTop() > $nav.height());
            $logoLeft.toggleClass('showLogoLeft', $(this).scrollTop() > $nav.height());
        });
    });

      $(document).ready(function(){
        $('.carousel').carousel();

        $('.nextCarouselVideo').on("click", function(){
            let carouselVi = $(this).parent().children(".carousel");
            carouselVi.carousel("next");
        });

        $('.previousCarouselVideo').on("click", function(){
            let carouselVi = $(this).parent().children(".carousel");
            carouselVi.carousel("prev");
        });
      });
      
});
