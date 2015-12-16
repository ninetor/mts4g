$(document).ready(function () {
    // detect touch device
    if (isTouchDevice() === true) {
        $('body').addClass('touch');
    } else {
        $('body').addClass('no-touch');
    }

    //SCROLL to
    if ($('.scroll').length > 0) {
        $('.scroll').click(function () {
            var el = $(this).attr('href');
            var elWrapped = $(el);
            scrollToDiv(elWrapped, 40);
            return false;
        });
    }
    ;

    //VK.init(function () {
    // API initialization succeeded
    // Your code here
    //}, function () {
    // API initialization failed
    // Can reload page here
    //}, '5.41');

    //ORDER-COUNTER
    counter();

    //PHONE-SLIDER
    if ($('.phone-slider').length > 0) {
        $('.phone-slider').slick({
            fade: true,
            dots: false,
            prevArrow: $('.phone-slider__prev'),
            nextArrow: $('.phone-slider__next'),
            adaptiveHeight: true,
            speed: 500,
        });

        //PRELOADER
        var opts = {
            lines: 11
            , length: 19
            , width: 2
            , radius: 11
            , scale: 0.5
            , corners: 0.9
            , color: '#000'
            , opacity: 0.25
            , rotate: 0
            , direction: 1
            , speed: 1
            , trail: 60
            , fps: 20
            , zIndex: 2e9
            , className: 'spinner'
            , top: '50%'
            , left: '50%'
            , shadow: false
            , hwaccel: false
            , position: 'absolute'
        };
        var target = document.getElementById('phone-loader');
        var spinner = new Spinner(opts).spin(target);

        $('#phone-loader').fadeOut(500, function () {
            $('.phone-slider').animate({'opacity': '1'}, 1000);
        });
    }
    ;


    if ($(window).width() < 633) {
        var firstListHeight = $(".slick-active .advantages-list__left").innerHeight() + 62;
        $(".slick-active .advantages-list__right").css("top", firstListHeight);
        $(".phone-slider__arrows").prependTo($(".slick-list"));
    }
    else if ($(window).width() > 633) {
        $(".slick-active .advantages-list__right").css("top", "102px");
        $(".phone-slider__arrows").insertAfter($(".phone-slider"));
    }

    $(window).resize(function () {
        var firstListHeight = $(".slick-active .advantages-list__left").innerHeight() + 62;
        if ($(window).width() < 633) {
            $(".phone-slider__arrows").prependTo($(".slick-list"));
            $(".advantages-list__right").css("top", firstListHeight);
        }
        else if ($(window).width() > 633) {
            $(".slick-active .advantages-list__right").css("top", "102px");
            $(".phone-slider__arrows").insertAfter($(".phone-slider"));
        }
    });

    //QUESTIONS ACCORD
    $('.questions-accord__item').on('click', function () {
        $(this).toggleClass('visible');
        $(this).find('.answer').slideToggle(100);
        $(this).find('.button').toggleClass('open');
        return false
    });

    //MOBILE MENU
    $('.menu-btn').click(function () {
        $('.layout').toggleClass('active');
        $('.menu-right').toggleClass('active');
        $(this).toggleClass('active');
        return false
    })


    //POPUP
    $(".step1").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        padding: 30,
        maxWidth: 800,
        minHeight: 300,
    });


    $(".member-popup").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        padding: 60,
        arrows: true,
        // maxWidth: 700,
        // minHeight: 400,
        // minWidth: 700,
    });

    //FILE UPLOAD
    //$('#fileupload').on('change', function () {
    //    $('#fileinfo span').text($(this).val());
    //});
    //
    ////DROP IMAGE
    //if ($('#dropBox').length > 0) {
    //    var dropBox;
    //    window.onload = function () {
    //        dropBox = document.getElementById("dropBox");
    //        dropBox.ondragenter = ignoreDrag;
    //        dropBox.ondragover = ignoreDrag;
    //        dropBox.ondrop = drop;
    //    };
    //}
    //;



    //function ignoreDrag(e) {
    //    e.stopPropagation();
    //    e.preventDefault();
    //}
    //
    //function drop(e) {
    //    e.stopPropagation();
    //    e.preventDefault();
    //
    //    var data = e.dataTransfer;
    //    var files = data.files;
    //
    //    processFiles(files);
    //}

    //function processFiles(files) {
    //    var file = files[0],
    //        reader = new FileReader();
    //    reader.onload = function (e) {
    //        dropBox.style.backgroundImage = "url('" + e.target.result + "')";
    //    };
    //    reader.readAsDataURL(file);
    //}

    $("input[name='type']").change(function () {
        var val = $(this).val();

        var text = "";
        switch (parseInt(val)) {
            case 1:
                text = "Например: Я хочу прокатить  любимую на 4Gтакси!";
                break;
            case 2:
                text = "Например: Заказываю 4Gтакси,  чтобы сделать с ним селфи! ";
                break;
            case 3:
                text = "Например: Мне нужно 4Gтакси, так как на бэтмобиле ездить уже надоело.  ";
                break;
            case 4:
                text = "Например: У меня день рождения! Пусть ко мне приедет 4Gтакси!";
                break;
        }

        $('#textmessage').attr('placeholder', text);

    });

    //$('.radio-wrap').on('click',function(element){
    //    console.log($(element).val());
    //})


    if (window.location.hash) {
        var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
        if (hash == "step1") {
            $('.step1').trigger("click");
        }
    }


    $('.menu-right__list-item a').on('click',function(){
        $('.menu-right').removeClass('active');
        $('.layout').removeClass('active');
    })

});


// functions
function isTouchDevice() {
    return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
}

function scrollToDiv(element, navheight) {
    var offset = element.offset();
    var offsetTop = offset.top;
    var totalScroll = offsetTop - navheight + 40;

    $('body,html').animate({
        scrollTop: totalScroll
    }, 500);
}

function counter() {
    if ($('.counter-wrapper').length > 0) {
        $('.counter-wrapper').empty();
        var number = $(".counter-input").val();
        var numArray = number.split("");
        for (var i = 0; i < numArray.length; i++) {
            numArray[i] = parseInt(numArray[i], 10);
            $(".counter-wrapper").append('<span class="digit-con"><span class="digit' + i + '">0<br>1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br></span></span>');
        }
        var increment = $('.digit-con').outerHeight();
        var speed = 1200;

        for (var i = 0; i < numArray.length; i++) {
            $('.digit' + i).animate({top: -(increment * numArray[i])}, speed);
        }
    }
    ;
}


/**
 * @return {boolean}
 */
function StepOne() {

    var val = $('.textarea-wrap').find('textarea').val();
    var valsoc = $('#socialOrder').val();
    if (val != "" && valsoc != "") {
        $('#step2-info__text').text(val);
    }
    else {
        if (val == "") {
            $('.textarea-wrap').find('textarea').css({'border-color': 'red'});
        }
        else if (valsoc == "") {
            $('#socialOrder').css({'border-color': 'red'});
        }
        return;
    }
    $("#tostep2").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        padding: 50,
        maxWidth: 800,
    }).click();
}


/**
 * @return {boolean}
 */
function createOrder() {
    var formData = new FormData($('#form_step12')[0]);

    var croppedImg = $('#cropContainerMinimal').find('.croppedImg');
    var src = croppedImg.attr('src');
    if (typeof src != 'undefined') {
        formData.append('image', src);
    }

    $.ajax({
        url: "/createorder",
        type: "POST",
        data: formData,
        dataType: 'json',
        //async: false,
        success: function (data) {
            console.log(data.success);
            if (data.success == 1) {
                object = data.object;
                $("#tostep3").fancybox({
                    'titlePosition': 'inside',
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    padding: 60,
                    maxWidth: 720,
                }).click();
                //crearevk();
            }
        },
        //cache: false,
        contentType: false,
        processData: false
    });

}

function showFourStep() {
    $("#tostep4").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none',
        padding: 60,
        maxWidth: 720,
    }).click();
}

function shareVK() {
    if (object) {
        $('#loadersoc').css('display', 'block');
        setTimeout(function() {
            $('#loadersoc').css('display', 'none');
            showFourStep();
        },3000);

        Share.vkontakte("http://"+window.host+'/members/?id=' + object.id, 'Хочу прокатиться на #4GтаксиМТС!',
            object.image
           , "Придумайте повод и получите шанс прокатиться на #4GтаксиМТС!");

    }
}
function shareFB() {
    if (object) {
        $('#loadersoc').css('display', 'block');
        setTimeout(function() {
            $('#loadersoc').css('display', 'none');
            showFourStep();
        },3000);
        Share.facebook("http://"+window.host+'/members/?id=' + object.id, 'Хочу прокатиться на #4GтаксиМТС!',
            object.image
            , "Придумайте повод и получите шанс прокатиться на #4GтаксиМТС!");

    }
}

function sendPhone() {
    var id = object.id;
    var phone = $('#phoneOrder').val();
    $.ajax({
        url: "/setphone",
        type: "POST",
        data: {id: id, phone: phone},
        dataType: 'json',
        success: function (data) {
            console.log(data.success);
            if (data.success == 1) {
                $("#tostep5").fancybox({
                    'titlePosition': 'inside',
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    padding: 60,
                    maxWidth: 720,
                }).click();

                $('#count-all-orders').val(parseInt($('#count-all-orders').val())+1);
                counter();


            }
        }
    });
}
