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

/*タイトルと背景画像を遅延表示*/
$(function(){
    $('.top-main-visual__copy__en').delay(500).queue(function(){
        $(this).addClass("show");
    });
    $('.top-main-visual__copy__jp').delay(550).queue(function(){
        $(this).addClass("show");
    });
    $('.under-contents__ttl__en').delay(800).queue(function(){
        $(this).addClass("show");
    });
    $('.under-contents__ttl__ja').delay(850).queue(function(){
        $(this).addClass("show");
    });
    $('.under-contents').delay(300).queue(function(){
        $(this).addClass("show");
    });
});