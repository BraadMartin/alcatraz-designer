/**
 * Customizer Preview JS.
 */

( function( $ ) {

	var $body = $( 'body' );

	/**
	 * Handle live previewing via postMessage.
	 */

	wp.customize( 'alcatraz_designer_options[body_bg_color]', function( value ) {
		value.bind( function( to ) {
			$body.css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[body_text_color]', function( value ) {
		value.bind( function( to ) {
			$body.css( 'color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[header_bg_color]', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[header_text_color]', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( 'color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[menu_bg_color]', function( value ) {
		value.bind( function( to ) {
			$( '#primary-menu' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[menu_text_color]', function( value ) {
		value.bind( function( to ) {
			$( '#primary-menu, #primary-menu a' ).css( 'color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[sub_menu_bg_color]', function( value ) {
		value.bind( function( to ) {
			$( '#primary-menu .sub-menu, .header-style-default .main-navigation #primary-menu .sub-menu, .header-style-short .main-navigation #primary-menu .sub-menu' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[sub_menu_text_color]', function( value ) {
		value.bind( function( to ) {
			$( '#primary-menu .sub-menu, #primary-menu .sub-menu a, .header-style-default .main-navigation #primary-menu .sub-menu .menu-item a, .header-style-short .main-navigation #primary-menu .sub-menu .menu-item a' ).css( 'color', to ).css( 'border-color', to );
			$( '#primary-menu .sub-menu-toggle .sub-menu-toggle-span' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[sidebar_bg_color]', function( value ) {
		value.bind( function( to ) {
			$( '.primary-sidebar' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[sidebar_text_color]', function( value ) {
		value.bind( function( to ) {
			$( '.primary-sidebar' ).css( 'color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[footer_bg_color]', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( 'background-color', to );
		});
	});

	wp.customize( 'alcatraz_designer_options[footer_text_color]', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( 'color', to );
		});
	});

})( jQuery );