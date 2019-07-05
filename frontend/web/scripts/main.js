$(document).ready(function () {
    $('body form').on('beforeSubmit', function () {
        // Вызывается после удачной валидации всех полей и до того как форма отправляется на северер.
        // Тут можно отправить форму через AJAX. Не забудьте вернуть false для того, чтобы форма не отправлялась как обычно.
        //e.preventDefault();
        var form = $(this);
        setTimeout(function () {
            if(form.find('.has-error').length < 1){
                var serl = form.serialize();

                $.ajax({
                    url: '/contact-form/call-back',
                    method: 'POST',
                    data: serl,
                    success: function (d) {
                        if(form.attr('id') == 'order-form') $('#orderModal').modal('hide');
                        $('#orderThanksModal').addClass(d).modal('show');
                        form.find('input[type=text]').val('');
                        form.find('.has-success').removeClass('has-success');
                        form.find('input').css('-webkit-box-shadow', 'inset 0 0 0 50px #fff');
                        setTimeout(function(){
                            $('#orderThanksModal').removeClass(d);
                            $('#orderThanksModal').modal('hide');
                        }, 3000);
                    },
                    error: function (d) {
                        console.log(d);
                    }
                });
            }
        },300);
        return false;
    });

    $('.accordion li > a').click(function(e) {
        e.preventDefault();
        $(this).stop().toggleClass('active');
        $(this).siblings('.accordion-content').stop().toggle('slow');
        $(this).find('i').stop().toggle();
    });

    $("#owl-together").owlCarousel({
        navigation : true, // показывать кнопки next и prev
        slideSpeed : 300,
        paginationSpeed : 400,
        items : 3,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause:true,
        navSpeed: 1000,
        autoplaySpeed: 1000,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    $("#owl-television").owlCarousel({
        navigation : true, // показывать кнопки next и prev
        slideSpeed : 300,
        paginationSpeed : 400,
        items : 8,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause:true,
        navSpeed: 1000,
        autoplaySpeed: 1000,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            380: {
                items: 2
            },
            480: {
                items: 3
            },
            650: {
                items: 4
            },
            768: {
                items: 5
            },
            992: {
                items: 6
            },
            1200: {
                items: 8
            }
        }
    });

    $('[data-toggle=modal]').on('click', function () {
        var info = $(this).data('info');
        var clas = $(this).data('class');
        $('#order-form input[name=info]').val(info);
        $('#order-form input[name=class]').val(clas);
    });

    $('#together .television').equalHeights();
    $('#city-page .blocks_tarif .television').equalHeights();
});