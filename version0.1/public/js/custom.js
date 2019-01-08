$(document).ready(function () {

	$("#login, #forgot, #signupmodal").on('shown.bs.modal', function (e) {
		$('body').hasClass('modal-open') ? '' : $("body").addClass("modal-open");
	}).on('hidden.bs.modal',function(){
		$('body').hasClass('modal-open') ?  $("body").removeClass("modal-open") : '';
	});

	//masonry
	if($('#grid').length >= 1){
		new AnimOnScroll( document.getElementById( 'grid' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		});
	}

	
	//heart active
	$('.heart i').click(function() {
    	$(this).toggleClass('active');
	});

	//heart active
	$('.share-collection i').click(function() {
    	$(this).toggleClass('active');
	});

	//Hamburger
	$(document).ready(function(){
		$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
			$(this).toggleClass('open');
		});
	});

	//search
	$('#search, #search1').click(function(){
		$('#open-search').slideToggle(250);
	});


	 $.fn.textWidth = function(_text, _font){//get width of text with font.  usage: $("div").textWidth();
		var fakeEl = $('<span>').hide().appendTo(document.body).text(_text || this.val() || this.text()).css('font', _font || this.css('font')),
		width = fakeEl.width();
		fakeEl.remove();
		return width;
		};

	$.fn.autoresize = function(options){//resizes elements based on content size.  usage: $('input').autoresize({padding:10,minWidth:0,maxWidth:100});
	  options = $.extend({padding:10,minWidth:0,maxWidth:10000}, options||{});
	  $(this).on('input', function() {
	    $(this).css('width', Math.min(options.maxWidth,Math.max(options.minWidth,$(this).textWidth() + options.padding)));
	  }).trigger('input');
	  return this;
	}


	$(".search-box input").autoresize({padding:20,minWidth:250,maxWidth:10000});

	
	
});