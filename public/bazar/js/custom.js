(function($) {
    
    "use strict";


    // Preloder
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    })

    // Text Animation On Slider
    var quotes = $(".quotes");
    var quoteIndex = -1;
    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(3000)
            .delay(4800)
            .fadeOut(200, showNextQuote);
    }
    showNextQuote();


    // Bootstrap tab Slider
    $('.carousel').carousel({
        pause: true,
        interval: false
    });


    // Navbar Fixed Top On Scroll
    var affixElement = '#navbar-main';

        $(affixElement).affix({
          offset: {
            // Distance of between element and top page
            top: function () {
              return (this.top = $(affixElement).offset().top)
            },
          }
    });


    // plus-minus Jquery
    $(function(){
        var valueElement = $('#value');
        function incrementValue(e){
            valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
            return false;
        }
        $('#plus').bind('click', {increment: 1}, incrementValue);
        $('#minus').bind('click', {increment: -1}, incrementValue);
    });
    $(function(){
        var valueElement = $('#value-two');
        function incrementValue(e){
            valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
            return false;
        }
        $('#plus-two').bind('click', {increment: 1}, incrementValue);
        $('#minus-two').bind('click', {increment: -1}, incrementValue);
    });



    // Scroll To Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });

    // owl-carousel for client 
    if($('.product-carousel').length){
        $('.product-carousel').owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            margin: 30,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            autoplaySpeed:1000,
            navText: [
              '<i class="fa fa-angle-left" aria-hidden="true"></i>',
              '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items:2,
                },
                600:{
                    items:3,
                },
                1000: {
                    items:5,
                },
            }
        })
    }



    // owl-carousel for testimonial 
    if($('.testimonial-carousel').length){
        $('.testimonial-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            margin: 50,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            autoplaySpeed:1000,
            animateOut:'',
            animateIn:'',
            responsive: {
                0: {
                    items:1,
                },
                600:{
                    items:1,
                },
                1000: {
                    items:2,
                },
            }
        })
    }



    // owl-carousel for client 
    if($('.client-carousel').length){
        $('.client-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
            margin: 50,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            autoplaySpeed:1000,
            responsive: {
                0: {
                    items:2,
                },
                600:{
                    items:3,
                },
                1000: {
                    items:5,
                },
            }
        })
    }

    // UI Range slider
    $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            values: [ 500, 1150 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    // ----------- Ajax Contact script -----------//
    $(function() {
        // Get the form.
        var form = $('#ajax-contact');

        // Get the messages div.
        var formMessages = $('#form-messages');

        // TODO: The rest of the code will go here...
    });
    // Set up an event listener for the contact form.
    $(form).submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

        // TODO
    });
    // Serialize the form data.
    var formData = $(form).serialize();
    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
    })
    .done(function(response) {
        // Make sure that the formMessages div has the 'success' class.
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        // Set the message text.
        $(formMessages).text(response);

        // Clear the form.
        $('#name').val('');
        $('#subject').val('');
        $('#email').val('');
        $('#message').val('');
    })

    .fail(function(data) {
        // Make sure that the formMessages div has the 'error' class.
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        // Set the message text.
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }
    });



})(window.jQuery);