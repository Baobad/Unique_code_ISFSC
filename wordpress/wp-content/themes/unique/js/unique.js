/**
 * @version 20130910
 */

var $j = jQuery.noConflict();

$j( document ).ready(

	function() {

		/* Mobile menu. */
		$j( '.menu-toggle' ).click(
			function() {
				$j( this ).parent().children( '.wrap, .menu-items' ).fadeToggle();
				$j( this ).toggleClass( 'active' );
			}
		);

		/* Overrides WP's <div> wrapper around videos, which mucks with flexible videos. */
		$j( 'div[style*="max-width: 100%"] > video' ).parent().css( 'width', '100%' );

		/* Responsive videos. */
		/* blip.tv adds a second <embed> with "display: none".  We don't want to wrap that. */
		$j( 'object, embed, iframe' ).not( 'embed[style*="display"], [src*="soundcloud.com"]' ).wrap( '<div class="embed-wrap" />' );

		/* Removes the 'width' attribute from embedded videos and replaces it with a max-width. */
		$j( '.embed-wrap object, .embed-wrap embed, .embed-wrap iframe' ).attr( 
			'width',
			function( index, value ) {
				$j( this ).attr( 'style', 'max-width: ' + value + 'px;' );
				$j( this ).removeAttr( 'width' );
			}
		);

		/* Flexslider. */
		if ( $j.isFunction( $j.fn.flexslider ) ) {

			/* Flexslider */
			$j( '.flexslider' ).flexslider(
				{
					animation: "slide",
					selector: ".slides > .slide"
				}
			);
		}
	}
);