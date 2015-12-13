$(document).ready(function() {
	// detect touch device
	if (isTouchDevice() === true) {
		$('body').addClass('touch');
	} else {
		$('body').addClass('no-touch');
	}

	//SCROLL to
	if ($('.scroll').length>0) {
		$('.scroll').click(function () { 
			var el = $(this).attr('href');
		    var elWrapped = $(el);
		    scrollToDiv(elWrapped,40);
    		return false;
	   	});
	};
	
	//ORDER-COUNTER
	counter();

	//PHONE-SLIDER
	if ($('.phone-slider').length>0) {
		$('.phone-slider').slick({
			fade: true,
			dots: false,
			prevArrow: $('.phone-slider__prev'),
	        nextArrow: $('.phone-slider__next'),
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

		$('#phone-loader').fadeOut(500, function(){
		 	$('.phone-slider').animate({'opacity':'1'},1000);
		});
	};
	

	if ($(window).width() < 633) {
			var firstListHeight = $(".advantages-list__left").innerHeight() + 62;
			$(".advantages-list__right").css("top",firstListHeight);
		    $(".phone-slider__arrows").prependTo($(".slick-list"));
		}
	else if ($(window).width() > 633){
		$(".advantages-list__right").css("top","102px");
		$(".phone-slider__arrows").insertAfter($(".phone-slider"));
	}

    $(window).resize(function() {
    	var firstListHeight = $(".advantages-list__left").innerHeight() + 62;
	    if ($(window).width() < 633) {
		    $(".phone-slider__arrows").prependTo($(".slick-list"));
		    $(".advantages-list__right").css("top",firstListHeight);
		}
		else if ($(window).width() > 633){
			$(".advantages-list__right").css("top","102px");
			$(".phone-slider__arrows").insertAfter($(".phone-slider"));
		}
	});

    //QUESTIONS ACCORD
	$('.questions-accord__item').on('click', function(){
		$(this).toggleClass('visible');
		$(this).find('.answer').slideToggle(100);
	    $(this).find('.button').toggleClass('open');
	    return false
	});

	//MOBILE MENU
	$('.menu-btn').click(function(){
		$('.layout').toggleClass('active');
		$('.menu-right').toggleClass('active');
		$(this).toggleClass('active');
		return false
	})



	//POPUP
	$(".step1").fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 30,
        maxWidth	: 800,
        minHeight: 300,
    });

    $(".step3").fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 60,
        maxWidth	: 720,
    });
    $(".step4").fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 60,
        maxWidth	: 720,
    });
    $(".step5").fancybox({
        'titlePosition'     : 'inside',
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 60,
        maxWidth	: 720,
    });

    $(".member-popup").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        padding: 60,
        arrows: true,
        // maxWidth: 700,
        // minHeight: 400,
        // minWidth: 700,
	});

    //FILE UPLOAD
    $('#fileupload').on('change', function(){
	 	$('#fileinfo span').text($(this).val());
	});

    //DROP IMAGE
    if ($('#dropBox').length>0) {
    	var dropBox;
		window.onload = function(){
			dropBox = document.getElementById("dropBox");
			dropBox.ondragenter = ignoreDrag;
			dropBox.ondragover = ignoreDrag;
			dropBox.ondrop = drop;
		};
    };

	// functions
	function isTouchDevice() {
		return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
	}
	function scrollToDiv(element,navheight){
	    var offset = element.offset();
	    var offsetTop = offset.top;
	    var totalScroll = offsetTop-navheight+40;
	 
	    $('body,html').animate({
	            scrollTop: totalScroll
	    }, 500);
	}
	function counter(){
		if ($('.counter-wrapper').length>0) {
			$('.counter-wrapper').empty();
			var number = $(".counter-input").val();
			var numArray = number.split("");
			for(var i=0; i<numArray.length; i++) { 
				numArray[i] = parseInt(numArray[i], 10);
				$(".counter-wrapper").append('<span class="digit-con"><span class="digit'+i+'">0<br>1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br></span></span>');	
			}
			var increment = $('.digit-con').outerHeight();
			var speed = 1200;

			for(var i=0; i<numArray.length; i++) {
				$('.digit'+i).animate({top: -(increment * numArray[i])}, speed);
			}
		};
	}
	function ignoreDrag(e){
	  	e.stopPropagation();
	  	e.preventDefault();
	}
	function drop(e){
	  	e.stopPropagation();
	  	e.preventDefault();
	  
	  	var data = e.dataTransfer;
	  	var files = data.files;
	  
	  	processFiles(files);
	}
	function processFiles(files){
	  	var file = files[0],
	      reader = new FileReader();
	  	reader.onload = function(e){
	    	dropBox.style.backgroundImage = "url('"+e.target.result+"')";
	  	};
	  	reader.readAsDataURL(file);
	}

	if(window.location.hash) {
		var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
		if (hash=="step1")
		{
			$('.step1').trigger("click");
		}
	}
});


/**
 * @return {boolean}
 */
function StepOne()
{

	var val = $('.textarea-wrap').find('textarea').val();
	if (val!= "")
	{$('#step2-info__text').text(val);}
	else
	{
		$('.textarea-wrap').find('textarea').css({'border-color':'red'});
		return;
	}
	$(".step2").fancybox({
						'titlePosition'     : 'inside',
						'transitionIn'      : 'none',
						'transitionOut'     : 'none',
						padding: 50,
						maxWidth	: 800,
					}).click();

	//var form = $('#form_step1').serialize();
	//$.ajax({
	//	data: {form: form},
	//	dataType: 'json',
	//	type: 'POST',
	//	url: '/stepone',
	//	success: function (data) {
	//		if (data.success == 1) {
	//			var id = data.id;
	//			$('#id_input_step2').val(id);
	//			$(".step2").fancybox({
	//				'titlePosition'     : 'inside',
	//				'transitionIn'      : 'none',
	//				'transitionOut'     : 'none',
	//				padding: 50,
	//				maxWidth	: 800,
	//			}).click();
	//		}
	//		else {
	//			$('.textarea-wrap').find('textarea').css({'border-color':'red'});
	//		}
	//	}
	//});
	//return false;
}



/**
 * @return {boolean}
 */
function StepTwo() {
	var formData = new FormData($('#id_input_step2'));
	console.log(formData);return;
	$.ajax({
		url: "page.php",
		type: "POST",
		data: formData,
		async: false,
		success: function (msg) {
			alert(msg)
		},
		cache: false,
		contentType: false,
		processData: false
	});

	e.preventDefault();
}


function shareFB ()
{
	FB.ui(
                    {
                        method: 'share',
                        name: 'fase',
                        picture: 'http://fbrell.com/f8.jpg',
                        caption: 'asdasdasddas',
                        description: 'olololol',
						href: 'ns.nineseven.ru',
                    },
                    function(response) {
                        if (response && response.post_id) {
                            alert('Post was published.');
                        } else {
                            alert('Post was not published.');
                        }
                    }
            );
}