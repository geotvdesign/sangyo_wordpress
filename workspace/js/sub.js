/*要素のフェードイン*/
$(function(){
    $(window).scroll(function(){
        $('.fadein,.fadein-left').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 200){
                $(this).addClass('scrollin');
            }
        });
    });
});