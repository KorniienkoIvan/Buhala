// Slider

$(document).ready(function() {
	var w = $(window).width();

	$('.main_slider').slick({
		infinite: true,
		slidesToShow: 1,
		infinite: true,
		dots: true,
		arrows: false,
		autoplay: true,
		accessibility: false
	});

	$('.reviews_slider').slick({
		infinite: true,
		slidesToShow: 1,
		infinite: true,
		dots: true,
		arrows: false,
		autoplay: true,
		accessibility: false
	});
	$(window).on('resize', function () {
		console.log($(window).width());
	  });
	$('.room-cards-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 993,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 1,

			  }
			},
			{
			  breakpoint: 567,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			  }
			}
		  ]
    });

});



// Open mobile menu

$(document).on('click', '.burger', function () {
	var e = $('.main_nav');

	e.toggleClass('active');

	if ($(this).hasClass('active')) {
		$('html').css('overflow', 'hidden');
	} else {
		$('html').css('overflow', 'scroll');
	}
});

// Menu fixed on scroll

$(document).ready(function(){
	const navOffset = $('#header').offset().top;
	const navHeight = $('#header').height();
	const navHeightAdmin = $('#header').height() + 32;
	$(window).scroll(function(){
		//console.log(navOffset);
		const scrolled = $(this).scrollTop();
		//console.log(scrolled);
		const headerHeight = $('#header').height() + 'px';
		// console.log(navHeight);
		// console.log(navOffset);
		// console.log(scrolled);
		if(scrolled > 0) {
			$('#header').addClass('nav-fixed');
			$('.content-area').css('margin-top',navHeight);
			$('.admin-bar .content-area').css('margin-top',navHeightAdmin);
			
		} else if (scrolled <= navOffset){
			$('#header').removeClass('nav-fixed');
			$('.content-area').css('margin-top',0);
			
			
		}
	});
});

// Menu fixed on scroll homepage

$(document).ready(function(){
	const frontNavOffset = $('.main_nav').offset().top;
	const frontNavHeight = $('.main_nav').height();
	const frontNavHeightAdmin = $('.main_nav').height() + 32;
	$(window).scroll(function(){
		
		const scrolled = $(this).scrollTop();
		const headerHeight = frontNavHeight + 'px';
		console.log(frontNavHeightAdmin);
		console.log(frontNavOffset);
		console.log(scrolled);
		if(scrolled > 0) {
			$('.main_nav').addClass('nav-fixed');
			$('.content-area').css('margin-top',frontNavHeight);
			$('.admin-bar .content-area').css('margin-top',frontNavHeightAdmin);
			
		} else if (scrolled < frontNavOffset){
			$('.main_nav').removeClass('nav-fixed');
			$('.content-area').css('margin-top',0);
			
			
		}
	});
});



/*Quantity */
(function ($) {
	$.fn.niceNumber = function (options) {
		var defaults = {
			autoSize: true,
			autoSizeBuffer: 1,
			buttonDecrement: '-',
			buttonIncrement: '+',
			buttonPosition: 'around',

			/**
				callbackFunction
				@param {$input} currentInput - the input running the callback
				@param {number} amount - the amount after increase/decrease
				@param {object} settings - the passed niceNumber settings
			**/
			onDecrement: false,
			onIncrement: false,
		};
		var settings = $.extend(defaults, options);

		return this.each(function () {
			var currentInput = this,
				$currentInput = $(currentInput),
				maxValue = $currentInput.attr('max'),
				minValue = $currentInput.attr('min'),
				attrMax = null,
				attrMin = null;

			// Skip already initialized input
			if ($currentInput.attr('data-nice-number-initialized')) return;

			// Handle max and min values
			if (
				maxValue !== undefined &&
				maxValue !== false
			) {
				attrMax = parseFloat(maxValue);
			}

			if (
				minValue !== undefined &&
				minValue !== false
			) {
				attrMin = parseFloat(minValue);
			}

			// Fix issue with initial value being < min
			if (attrMin && !currentInput.value) {
				$currentInput.val(attrMin);
			}

			// Generate container
			var $inputContainer = $('<div/>', {
				class: 'nice-number',
			}).insertAfter(currentInput);

			// Generate interval (object so it is passed by reference)
			var interval = {};

			// Generate buttons
			var $minusButton = $('<button/>')
				.attr('type', 'button')
				.html(settings.buttonDecrement)
				.on('mousedown mouseup mouseleave', function (event) {
					changeInterval(event.type, interval, function () {
						var currentValue = parseFloat($currentInput.val() || 0);
						if (
							attrMin == null ||
							attrMin < currentValue
						) {
							var newValue = currentValue - 1;
							$currentInput.val(newValue);
							if (settings.onDecrement) {
								settings.onDecrement(
									$currentInput,
									newValue,
									settings
								);
							}
						}
					});

					// Trigger the input event here to avoid event spam
					if (event.type == 'mouseup' || event.type == 'mouseleave') {
						$currentInput.trigger('input');
					}
				});

			var $plusButton = $('<button/>')
				.attr('type', 'button')
				.html(settings.buttonIncrement)
				.on('mousedown mouseup mouseleave', function (event) {
					changeInterval(event.type, interval, function () {
						var currentValue = parseFloat($currentInput.val() || 0);
						if (
							attrMax == null ||
							attrMax > currentValue
						) {
							var newValue = currentValue + 1;
							$currentInput.val(newValue);
							if (settings.onIncrement) {
								settings.onIncrement(
									$currentInput,
									newValue,
									settings
								);
							}
						}
					});

					// Trigger the input event here to avoid event spam
					if (event.type == 'mouseup' || event.type == 'mouseleave') {
						$currentInput.trigger('input');
					}
				});

			// Remember that we have initialized this input
			$currentInput.attr('data-nice-number-initialized', true);

			// Append elements
			switch (settings.buttonPosition) {
				case 'left':
					$minusButton.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					$currentInput.appendTo($inputContainer);
					break;
				case 'right':
					$currentInput.appendTo($inputContainer);
					$minusButton.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					break;
				case 'around':
				default:
					$minusButton.appendTo($inputContainer);
					$currentInput.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					break;
			}

			// Nicely size input
		});
	};

	function changeInterval(eventType, interval, callback) {
		if (eventType == 'mousedown') {
			interval.timeout = setTimeout(function () {
				interval.actualInterval = setInterval(function () {
					callback();
				}, 100);
			}, 200);
			callback();
		} else {
			if (interval.timeout) {
				clearTimeout(interval.timeout);
			}
			if (interval.actualInterval) {
				clearInterval(interval.actualInterval);
			}
		}
	}
})(jQuery);




$(document).ready(function(){


	
		$('.quantity-input__wrapper').on('click', function() {
			console.log('Document click2 ');
		});

		$(document).on('click','.product-template-default .btn-plus, .product-template-default .btn-minus', function(e) {
			const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
			const input = $(e.target).closest('.quantity').find('input');
			if (input.is('input')) {
			input[0][isNegative ? 'stepDown' : 'stepUp']()
			}
			$('button').attr('aria-disabled', 'false').prop("disabled", false);
			console.log('Document click');
		});

	
	// $('.coupon_btn').on('click', function() {
	// 	$('button[name="apply_coupon"]').click();
	// 	// alert("The text has been changed.");
	// });
});

var $ = jQuery;

// $('.coupon_input').change(function() {
// 	$('#coupon_code').val($(this).val());
// 	$('button[name="apply_coupon"]').click();
// 	alert("The text has been changed.");
// });


//init popups
$("[data-popup]").each(function(){
	let target = $(this).data('popup');
	$(this).click(function(){
	  $(target).addClass('active');
	  $('body').addClass('popup-active');
	});
  });
  $('.popup').each(function(){
	let element = $(this);
	let close = $('#review_form_wrapper').find('.popup__close');
	close.click(function(){
		$('body').removeClass('popup-active');
	});
  });
  $('.popup__close').click(function(){
	  $('.single').removeClass('popup-active')
  })


//   $(document).on('click', function(){
// 	$('.woocommerce-shipping-totals > th').text('Ship');
//   })
  

  $(document).ready(function(){
	// $('#customer_details .woocommerce-billing-fields').hide();
	// $('#customer_details .buhala-add-info').hide();
	// $('#customer_details .woocommerce-shipping-fields').hide();
	// $('#customer_details .buhala-shipping').hide();
	// $('#customer_details .woocommerce-checkout-payment').hide();
	// $('#customer_details .woocommerce-terms-and-conditions-wrapper').hide();

	$('body:not(".logged-in") #customer_details').hide();
	$('body:not(".logged-in") .createaccount_info').hide();
	$(".woocommerce-account-fields").hide();
	$('body:not(".logged-in") .createaccount').on('click', function(){
		$('.woocommerce-account-fields .woocommerce-form__input').prop('checked', true);
		$('#customer_details').show();
		$('.createaccount_info').show();
		$('.createaccount__wrapper').hide();
		$('p.create-account').hide();
		$('.create-account').show();
		//Email as username on checkout page
		$('div.woocommerce').on('change', '#billing_email', function(){
			jQuery('#account_username').val($(this).val());
		});
	});
	$('body:not(".logged-in") .continueasguest').on('click', function(){
		$('#customer_details').show();
		$('.createaccount__wrapper').hide();
	});

	// password email = password username
	$('.register .hide').hide();
	$('div.woocommerce').on('change', '#reg_email', function(){
		jQuery('#reg_username').val($(this).val());
	});
	

	
  });

  $('.appear').each(function() {
    let el = $(this);
    let inview = el.waypoint(function(direction) {
        el.addClass('visible');
    }, {
        offset: '160%'
    });
});

$('.point-item__arrow').each(function() {
  let el = $(this);
  let inview = el.waypoint(function(direction) {
      el.removeClass('animate');
  }, {
      offset: '95%'
  });
});


$(window).scroll(function() {
    if ($(this).scrollTop() > 1000) {
        $('#scroll-top').fadeIn();
    } else {
        $('#scroll-top').fadeOut();
    }
});

$("a[href='#scroll-top']").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
  });
  
  $(document).ready(function(){
	$('.history-back').on('click', function(e){
		e.preventDefault();
		window.history.back();
	});
	var referrerDomain = document.referrer.split('/')[2];
	console.log(referrerDomain);
	if (referrerDomain != "buhala.purpleplanet.website") {
		var backHistory = document.getElementsByClassName("history-back");
		backHistory.href = "https://buhala.purpleplanet.website/services/";
	}
  });


  //Smooth scroll


//   $('a[href*="#"]')
//   // Remove links that don't actually link to anything
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .not('[href="#scroll-top"]')
//   .click(function(event) {
//     // On-page links
//     if (
//       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//       && 
//       location.hostname == this.hostname
//     ) {
//       // Figure out element to scroll to
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       // Does a scroll target exist?
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
// 		event.preventDefault();
// 		console.log('click1');
//         $('html, body').animate({
//           scrollTop: target.offset().top - 150
//         }, 1000, function() {
//           // Callback after animation
//           // Must change focus!
//           var $target = $(target);
//           $target.focus();
//           if ($target.is(":focus")) { // Checking if the target was focused
//             return false;
//           } else {
//             $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//             $target.focus(); // Set focus again
//           };
//         });
//       }
//     }
//   });

  $(document).ready(function(){
	$('.my-account__login-form .u-column2').hide();
	$('.my-account__login-form .user-register').on('click', function(event){
		event.preventDefault();
		$(".u-column1").hide();
		$(".u-column2").show();
	});
	
	$(".back-to-login").on('click', function(event){
		event.preventDefault();
		$(".u-column2").hide();
		$(".u-column1").show();
	});
  });



// Product ask a question button

// #tab-wpc_comment_tab

$(".ask-question-button").on("click", function(click){
	click.preventDefault();
	$('#tab-title-wpc_comment_tab > a').click();
	$("html, body").delay(100).animate({
        scrollTop: $('#tab-title-wpc_comment_tab').offset().top - 100 
    }, 1000);
});
$(".write-review-button").on("click", function(click){
	click.preventDefault();
	$('#tab-title-reviews > a').click();
});


//ajax add to cart
$(document.body).trigger('wc_fragments_refreshed');



// checked label for input
$(document).on('click', '.woocommerce-account .container .woocommerce .woocommerce-form .form-row label.woocommerce-form__label input', function () {
	$(this).parent().toggleClass('active');
})


// checked input

$(document).on('click', '.wc_payment_method__form-control label', function () {
	var e = $(this).parent();

	$('.wc_payment_method__form-control').removeClass('active');
	e.addClass('active');
});

$(document).on('click', '.woocommerce-SavedPaymentMethods.wc-saved-payment-methods label', function () {
	var e = $(this);

	$('.woocommerce-SavedPaymentMethods.wc-saved-payment-methods label').removeClass('active');
	e.addClass('active');
});

$(document).on('click', '#payment.woocommerce-checkout-payment .wc_payment_methods_list li #stripe-payment-data label[for="wc-stripe-new-payment-method"]', function () {
	$(this).toggleClass('active');
});

$(document).ready(function () {
	// $('.woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox').addClass('active');
})

$(document).on('click', '.woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox input', function () {
	$(this).parent().toggleClass('active');
});


// sub-menu hover
$(document).on('click', '.menu-item-has-children span', function () {
	$('.sub-menu').slideToggle(230);
	$('body').toggleClass('submenu-active');
	$(this).parent('.menu-item-has-children').toggleClass('my-submenu-active');
});


// menu before

// $(document).ready(function () {
// 	var e = $('.menu-item-has-children .sub-menu').parent(),
// 		html = e.html(),
// 		Newhtml = html + '<span></span>';

// 	e.html(Newhtml);
	
// })

$(".service_sub_menu .menu-item-has-child").on("click", function(){
	$(this).toggleClass("active");
	console.log("test");
});








