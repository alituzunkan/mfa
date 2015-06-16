/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );

	// Enable menu toggle for small screens.
	/*( function() {
		var nav = $( '#primary-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.foreignaffairs', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();*/

	/*
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.foreignaffairs', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();

			// Repositions the window on jump-to-anchor to account for header height.
			window.scrollBy( 0, -80 );
		}
	} );

	// Arrange footer widgets vertically.
	if ( $.isFunction( $.fn.masonry ) ) {
		$( '#footer-sidebar' ).masonry( {
			itemSelector: '.widget',
			columnWidth: function( containerWidth ) {
				return containerWidth / 4;
			},
			gutterWidth: 0,
			isResizable: true,
			isRTL: $( 'body' ).is( '.rtl' )
		} );
	}

	// Initialize Featured Content slider.
	_window.load( function() {
		if ( body.is( '.slider' ) ) {
			$( '.featured-content' ).featuredslider( {
				selector: '.featured-content-inner > article',
				controlsContainer: '.featured-content'
			} );
		}
        $(".menu-item-has-children").find("ul.sub-menu").removeAttr("style");
	} );
	
	_window.load( function() {
		$(".representative_container").click(function(){
			
			if($(this).hasClass("active")){

			}
			else{
				$(".representative_container").removeClass("active");
				$(this).addClass("active");
				$( ".gradient" ).removeAttr("style");
				$( ".representative_container > img" ).removeAttr("style");
				$( ".contact_info" ).removeAttr("style");
				$( ".city_title_container" ).removeAttr("style");
				$(this).find( ".gradient" ).animate({
					opacity: 0,
				  }, 500, function() {
					// Animation complete.
				  });
				$(this).find( ".city_title_container" ).animate({
					top: 0,
				  }, 500, function() {
					// Animation complete.
				  });
				 $(this).children("img").animate({
					opacity: 0,
				  }, 500, function() {
					// Animation complete.
				  }); 
				  $(this).find( ".contact_info" ).fadeIn();
				 }
		});
		
	} );
	
	
		_window.load( function() {
		$( ".more_content_container" ).each(function() {
			var totalHeight = $(this).find('.more_content_image').outerHeight(true);
			var othersHeight = $(this).find('.more_content_button').outerHeight(true) + $(this).find('.more_content_date').outerHeight(true) + $(this).find('.more_content_name').outerHeight(true);
			var normalHeight = $(this).find('.more_content_content').height();
			var contentHeight = totalHeight - othersHeight;
			$(this).find('.more_content_content').attr("data1",contentHeight);
			$(this).find('.more_content_content').attr("data2",normalHeight);
			$(this).find('.more_content_content').css("height",contentHeight);	
		});
		
		$('.more_content_button a').click(function(e){
		e.preventDefault();
		if($(this).parent().parent().hasClass("active")){
			var buttonText= $( this ).attr("data2");
			$(this).text(buttonText);
			$(this).parent().parent().removeClass("active");
			var animationHeight = $(this).parent().parent().find('.more_content_content').attr("data1");
			$(this).parent().parent().find('.more_content_content').animate({height:animationHeight},500,function(){});
		}
		else{
			$(this).parent().parent().addClass("active");
			var buttonText= $( this ).attr("data1");
			$(this).text(buttonText);
			var animationHeight = $(this).parent().parent().find('.more_content_content').attr("data2");
			$(this).parent().parent().find('.more_content_content').animate({height:animationHeight},500,function(){});
		}
		});
		
	} );
	
	_window.load( function() {
	
		$('.mfa_filebase .mfa_file_cat').click(function(e){
	
			var nextElement=$(this).next();
			
			var elementArray = [];
			
			if (nextElement.hasClass("mfa_download_file")){
				var stop = 0;
			}
			else{
				var stop = 1;
			}

			while (stop == 0){
				elementArray.push(nextElement);
				nextElement = nextElement.next();
							if (nextElement.hasClass("mfa_download_file")){
								stop = 0;
							}
							else{
								stop = 1;
							}
			}
			
			$.each(elementArray,function( index, value ){
				console.log(value);
				value.toggle("slow")
			});
		
		
		});	
			
	});
	
	_window.load(function(){
		$("#megaMenuToggle").click(function(){
				$("#megaUber").toggle("slow");
		});		
	});
	
	_window.load(function(){
		$(".sf-with-ul").click(function(e){
			console.log($(window).width());
			if( $(window).width()<768){
				e.preventDefault();
				$(this).find("ul").toggle("slow");
			}
		});		
	});
	
	_window.load(function(){
		$("#homecarousel").owlCarousel({
		autoPlay : 8000,
	    stopOnHover : true,
	    navigation:true,
	    pagination:false,
	    paginationSpeed : 1000,
	    goToFirstSpeed : 2000,
	    singleItem : true,
	    autoHeight : true,
	    navigationText : ["<",">"],
		});
	});
	
	_window.load( function() {
		$('.home_title').each(function(){
			var htmlString = $(this).html();
			$(this).html('<span>'+htmlString+'</span>');
		});
	});
	
	
	
} )( jQuery );
