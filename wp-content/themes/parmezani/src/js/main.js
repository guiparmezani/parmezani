;(function($, window, document, undefined) { //jquery reference

//Typing effect on banner
var captionLength = 0;
var caption = '';

captionEl = $('#caption');

function breakPeriods(s) {
  return s.replace(/\./, '.<br>');
}
function type() {
  if (!caption) { return; }
  captionEl.html(breakPeriods(caption.substr(0, captionLength++)));
  if(captionLength < caption.length+1) {
    setTimeout(type, 130);
  } else {
    captionLength = 0;
    caption = '';
  }
}

function initTypingEffect() {
  caption = $('.type').data("text");
  type();
}

//intro functions
setTimeout(function(){
  initTypingEffect();
}, 300);

setTimeout(function(){
	$('.hero-text').addClass('animated');
}, 1900);

setTimeout(function(){
	$('.scroll-btn').addClass('animated');
}, 3100);

$('a.anchor-link, .anchor-link a').click(function(e){
	e.preventDefault();
  $('.anchor-link, .anchor-link a').removeClass('active');
  $(this).addClass('active');
  if ($(window).width() > 991) {
   $(window).scrollTo($(this).attr('href'), 600, {offset: -65});
  } else {
	 $(window).scrollTo($(this).attr('href'), 600);
  }
});

$(window).scroll(function(){
  if ($(window).scrollTop() > 400) {
    $('.back-to-top').addClass('in');
    $('.sticky-header').addClass('in');
  } else {
    $('.back-to-top').removeClass('in');
    $('.sticky-header').removeClass('in');
  }
});

// background movement animation
var mX, mY, distance, bgBenderX, bgBenderX,
$element  = $('.screen-center');

function calculateDistance(elem, mouseX, mouseY) {
  return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left+(elem.width()/2)), 2) + Math.pow(mouseY - (elem.offset().top+(elem.height()/2)), 2)));
}

if ($(window).width() > 787) {
  $('.hero-area, header').mousemove(function(e) {
    mX = e.pageX;
    mY = e.pageY;
    distance = calculateDistance($element, mX, mY);
    
    bgBenderX = (mX / 100) + 50;
    bgBenderY = (mY / 4) + 50;

    $('.hero-area').css('background-position', bgBenderX + '% ' + bgBenderY + '%');


  });
}

$('.navbar-toggler').click(function(){
  $(this).toggleClass('pressed');
  if(!$(this).hasClass('pressed')) {
    $('.search-area').removeClass('in');
  }
});

$('body').scrollspy({ target: 'nav.navbar', offset: 66 });

$('.huge-hire-btn-wrapper').animate3d({rotation: 0.075});

$("#contact-form").submit(function(event) {
  event.preventDefault();

  console.log(ajax_object.ajax_url);

  var errors = false;

  if ($('#name-input').val().length < 1) {
    errors = true;
    $('#name-input').css('background', 'pink');
  } else {
    $('#name-input').css('background', '#FFF');
  }
  if ($('#email-input').val().length < 1) {
    errors = true;
    $('#email-input').css('background', 'pink');
  } else {
    $('#email-input').css('background', '#FFF');
  }
  if ($('#message-input').val().length < 1) {
    errors = true;
    $('#message-input').css('background', 'pink');
  } else {
    $('#message-input').css('background', '#FFF');
  }

  if(errors) {
    return;
  }

  $('.form-wrapper .static-content.in').removeClass('in');
  $('.loader').addClass('in');

  var data = { 
        name: $('#name-input').val(), 
        email: $('#email-input').val(),
        message: $('#message-input').val(),
        action: 'send_notification_mail'
      };
  
  $.post( ajax_object.ajax_url, data, function( response ) {
    setTimeout(function(){
      $('.form-wrapper').addClass('text-align');
      $('.form-wrapper span').text('Thank you for your message. You should hear back from me soon.');
      $('.form-wrapper form .input-wrapper').hide();
      $('.loader').removeClass('in');
    }, 1000);
  });
});

})(window.Zepto || window.jQuery, window, document);