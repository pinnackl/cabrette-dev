$(function(){
    function activeToggleVideo() {
        $('.active-large-thumbnail').click(function () {
            $(this).parent().toggleClass('col-md-12');
            console.log('coucou');
            $('.carre-white .display-content-' + $(this).data('post-id')).toggleClass('carre-yellow');
            $('.display-content-' + $(this).data('post-id')).toggle();
        });
    }



        $('.checkboxtype').change(function () {
            $(this).closest("form").submit();
        });


    activeToggleVideo();

    $('.btn-menu').click(function() {
        $('.menu-open').toggle();
    });

    $('.btn-close-menu').click(function() {
        $('.menu-open').toggle();
    });


    $('.form-filter-video').submit(function() {
        $.ajax({
            type: "GET",
            url: 'work',
            data: $(this).serialize(),
            success: function (data) {
                $('#work-content').html(data);
                activeToggleVideo();
            },
            error: function () {
                alert("failure");
            }
        });
        return false;
    });

    $('.see-more').click(function () {
        if($(this).html() == 'Voir plus') {
            $(this).html('Réduire')
        }else {
            $(this).html('Voir plus')
        }
        $('.more-info').toggle();
    });


    $('.radio-date').change(function () {
        $('.date-end').toggle();
    });

    $('.radio-theme').change(function () {
        $('.theme-select').toggle();
    });

    var bodyHeight = $("body").height();
    var vwptHeight = $(window).height();
    if (vwptHeight > bodyHeight) {
        $("footer#footer").css("position","absolute").css("bottom",0).css('left', 0).css('right', 0);
    }

});




