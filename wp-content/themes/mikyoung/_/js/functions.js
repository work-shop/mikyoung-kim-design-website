var hh = 60;
var scrollOffset = 60;
var minSmallOffset = 240;
var cw,ch,bh,dh,ch2;
var headerState = false;
loaded = false;
opening = false;
var flexsetup = false;

jQuery(document).ready(function($) {

	$('.flexslider-project .flex-previous').click(function() {
		$('.flexslider-project').flexslider('prev');
		console.log('flex-prev');
		return false;		
	});		
	
	$('.flexslider-project .flex-next').click(function() {
		$('.flexslider-project').flexslider('next');
		console.log('flex-next');
		return false;		
	});	

	
	$('.flexslider-full .flex-previous').click(function() {
		$('.flexslider-full').flexslider('prev');
		console.log('flex-prev');
		return false;		
	});		
	
	$('.flexslider-full .flex-next').click(function() {
		$('.flexslider-full').flexslider('next');
		console.log('flex-next');
		return false;		
	});		
	
	$('#backtotop').click(function(event) {
		event.preventDefault();
		$('body,html').animate({scrollTop:0},2000);
	});


	// $('#nav-toggle').click(function(event) {
	// 	event.preventDefault();
	// 	navToggle();
	// });

	$('.nav-toggle').click(function(event) {
		event.preventDefault();
		navToggle();
	});

	
	$('.nav-toggle-projects').click(function(event) {
		event.preventDefault();
		navToggle();
	});	
	
	
	$(document).keypress(function(e) {
		if(e.which == 109 || e.which == 77) {
			navToggle();
		}	
	});
	
	$(".jump").click(function(e){
		e.preventDefault();
		var thelink = $(this).attr("href");
		thelink = thelink.toLowerCase();
		goToByScroll(thelink);	

	});
	
	$(".jump-about").click(function(e){
		e.preventDefault();
		var thelink = $(this).attr("href");
		thelink = thelink.toLowerCase();
		goToByScrollAbout(thelink);	

	});	
	
	$("#awards-expand").click(function(e){
		e.preventDefault();
		if($('.awards-list').hasClass('toggled')){ 
			$('.awards-list').removeClass('toggled');
			$('#awards-expand').text('show all awards +');

		}
		else if(!$('.awards-list').hasClass('toggled')){
			$('.awards-list').addClass('toggled');	
			$('#awards-expand').text('hide awards -');

		}

	});	
	
	$("#blanket").click(function(e){
		e.preventDefault();
		navToggle();
	});	
	
	$("#ie-close").click(function(e){
		e.preventDefault();
		$('#ie-warning').addClass('hidden');	
	});			

	//added 12-9-17 to make all outlinks open in a new tab - removed to stop issues with addthis plugin
	// $('a').each(function() {
	// 	var a = new RegExp('/' + window.location.host + '/');
	// 	if(!a.test(this.href) || this.href === '#') {
	// 		$(this).click(function(event) {
	// 			event.preventDefault();
	// 			event.stopPropagation();
	// 			window.open(this.href, '_blank');
	// 		});
	// 	}
	// });

	$( '.modal-toggle' ).click(function(e){
		e.preventDefault();
		var target = $(this).data('modal-target');
		modalToggle(target, false);
	});

	$( '.modal-close' ).click(function(e){
		e.preventDefault();
		closeModal();	
	});

	$('.modal-blanket').click(function(e){
		e.preventDefault();
		closeModal();	
	});


});//end document.ready


$(window).load(function() {

	if( $('body').hasClass('home') || $('body').hasClass('page-id-77')){
		$('.flexslider-full').flexslider({
			animation: 'fade',
			controlNav: false,
			slideshowSpeed: 7000,           
			animationSpeed: 1500,         
			directionNav: false
		});
	}

	if($('body').hasClass('single-project')){
		$('.flexslider-project').flexslider({
			animation: 'slide',
			controlNav: false,
			slideshowSpeed: 7000,           
			animationSpeed: 1500,         
			directionNav: false,
			minItems: 1,
			maxItems: 1,
			useCss: false
		});
	}



	view(); 

});//end window.load



$(window).ready(function() {


});//end window.ready



$(window).resize(function() {

	view();	

	// if(flexsetup){
	// 	$('.flexslider-project').resize();
	// }
	
});//end window.resize


$(window).scroll(function(e) { 

	view(); 

});//end window.scroll


function goToByScroll(locale){
	$('html,body').animate({
		scrollTop: $(locale).offset().top - scrollOffset
	},2000);
}

function goToByScrollAbout(locale){
	$('html,body').animate({
		scrollTop: $(locale).offset().top - 120
	},2000);
}



function navToggle() {
	if(!headerState){
		$('#header').removeClass('closed');
		$('#header').addClass('open');
		$('body').removeClass('header-closed');
		$('body').addClass('header-open');	
		$('#toggle-help').html('type m to close menu');
		$('#blanket').addClass('on');

		headerState = true;
		
	}
	else if (headerState) {
		$('#header').removeClass('open');
		$('#header').addClass('closed');
		$('body').removeClass('header-open');
		$('body').addClass('header-closed');
		$('#toggle-help').html('type m for menu');
		$('#blanket').removeClass('on');
		$('#header').scrollTop(0);
		headerState = false;

	}
	
}


function view(){
	
	spy();
	
	ch = $(window).height();
	cw = $(window).width();
	
	containerWidth = $('.flexslider-project').width();
	var fph = containerWidth * 0.53333;

	fcw = (cw - containerWidth + 10) / 2;
	fcwr = fcw-5;
	bh = ch;
	bmsh = ch-hh-minSmallOffset;
	ffmh = bh-65;
	fffmh = ffmh-60;
	ratio = 1;//formerly 1.6
	ffh = cw/ratio;
	

	$('.block.min').css('min-height',bh);
	$('.block.min-small').css('min-height',bmsh);			
	$('.block.crop').css('height',bh);		
	//$('.homefix').css('height',ch);	

	if( $('body').hasClass('home') || $('body').hasClass('page-id-77')){
		// $('.flexslider-full .flex-viewport').css('max-height',ffmh);
		// $('.flexslider-full .slides li').css('max-height',ffmh);		
		// $('.flexslider-full ul.slides').css('max-height',ffmh);	
		// $('.flexslider-full .flex-viewport').css('height',ffmh);
		// $('.flexslider-full .slides li').css('height',ffmh);		
		// $('.flexslider-full ul.slides').css('height',ffmh);	
	}


	if($('body').hasClass('single-project')){
		if($(window).width() > 767){
			$('.flexslider-project .flexslider-direction').css('width',fcw);
			$('.flexslider-project .flexslider-direction.previous').css('left',-fcw);
			$('.flexslider-project .flexslider-direction.next').css('right',-fcw);
		} else{
			$('.flexslider-project .flexslider-direction').css('width',40);
			$('.flexslider-project .flexslider-direction.previous').css('left',0);
			$('.flexslider-project .flexslider-direction.next').css('right',0);			
		}

		$('.clip').css('width',cw);

		$('.flexslider-project').height(fph);
		$('.flexslider-project .flex-viewport').height(fph);
		$('.flexslider-project .slides').height(fph);
		$('.flexslider-project .slides li').height(fph);
		$('.flexslider-project .slides li').width(containerWidth);


	}


	ch2 = $(document).height() - $('#footer').height() - $(window).height() + 0;	

	if($(window).scrollTop() >= scrollOffset && $("body").hasClass('before')){
		$("body").removeClass('before');
		$("body").addClass('after');		
	} 
	else if($(window).scrollTop() < scrollOffset && $("body").hasClass('after')){
		$("body").removeClass('after');
		$("body").addClass('before');		 		 		
	} 
	
	if($(window).scrollTop() >= ch2 && $(this).scrollTop() >= 60 && !$("#header").hasClass('tucked')){
		//$("#header").addClass('tucked');
		$("#filters").addClass('tucked');					
	} 
	else if($(window).scrollTop() < (ch2-60) && $("#header").hasClass('tucked')){
		//$("#header").removeClass('tucked');
		$("#filters").removeClass('tucked');	
	}  
	
	if($('body').hasClass('page-id-77')){
		fixedNavTrigger = $('.fixed-nav-container').offset().top - 60;
		
		if($(window).scrollTop() >= fixedNavTrigger && !$(".fixed-nav").hasClass('on')){
			$(".fixed-nav").addClass('on');
		} 
		else if($(window).scrollTop() < fixedNavTrigger && $(".fixed-nav").hasClass('on')){
			$(".fixed-nav").removeClass('on');
		}   
	}	 

	if(!loaded){
		loadElements();
	}

}


function spy(){
	var menu = $('#about-nav .jump-about');
	var targets = new Array();

	//an array with [i][0] = menu item and [i][1] = scroll item
	menu.each(function(i){
		targets[i] = new Array(2);
		var temp = $(this).attr('href');
		var offset = $(temp).offset();	
		targets[i][0] = $(this);		
		targets[i][1] = offset.top;
	});
	
	for(var j = 0; j < targets.length; j++){
		if(($(window).scrollTop()+150) >= targets[j][1]){
			menu.removeClass('active');
			targets[j][0].addClass('active');
		}
	}	
	
}

function loadElements(){

	if( $(".flexslider-project").hasClass('has-video-1') ){
		$("#project-gallery-video-1").get(0).play();
	}
	
	if( $(".flexslider-project").hasClass('has-video-2') ){
		$("#project-gallery-video-2").get(0).play();
	}

	loaded = true;
	setTimeout(function(){
		$('.loading-mykd').addClass('loaded-mykd');
		$('.landing-mykd').addClass('landed-mykd');
	},500);		

	setTimeout(function() {
		flexsetup = true;
	}, 5000);

}

function modalToggle(_target, swap){
	console.log('modal-toggle');	
	var modalTarget = '#' + _target;
	console.log('target: ' + modalTarget);
	if( $('body').hasClass( 'modal-off' ) ){
		$(modalTarget).removeClass('off').addClass('on');
		$('body').removeClass( 'modal-off' ).addClass( 'modal-on' );
	}	

}


function closeModal(){

	if($('body').hasClass( 'modal-on' )){
		$( '.modal-mk' ).removeClass('on').addClass('off');
		$('body').removeClass( 'modal-on' ).addClass( 'modal-off' );
	}

}