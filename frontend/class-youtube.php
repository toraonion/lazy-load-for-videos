<?php
/**
 * @package Lazyload Youtube
 */
class Lazyload_Youtube extends Lazyload_Frontend {

	function __construct() {
		add_action( 'wp_head', array( $this, 'enable_lazyload_js' ) );
	}

	/**
	 * Lazy Load Youtube Videos (Load youtube script and video after clicking on the preview image)
	 * Thanks to »Lazy loading of youtube videos by MS-potilas 2012« (see http://yabtb.blogspot.com/2012/02/youtube-videos-lazy-load-improved-style.html)
	 */
	function enable_lazyload_js() {
		if ( parent::test_if_scripts_should_be_loaded() ) {
			wp_enqueue_script( 'lazyload_youtube_js', plugins_url( '../js/min/lazyload-youtube-ck.js' , __FILE__ ) );

			?>
			<script>
				var $lly_class = jQuery.noConflict();

				$lly_class(document).ready(function() {
					setOptionsYoutube({
						theme: '<?php if (get_option("lly_opt_player_colour") == "") { echo "dark"; } else { echo get_option("lly_opt_player_colour"); } ?>',
						colour: '<?php if (get_option("lly_opt_player_colour_progress") == "") { echo "red"; } else { echo get_option("lly_opt_player_colour_progress"); } ?>',
						relations: <?php if (get_option("lly_opt_player_relations") == "1") { echo "false"; } else { echo "true"; } ?>,
						controls: <?php if (get_option("lly_opt_player_controls") == "1") { echo "false"; } else { echo "true"; } ?>,
						playlist: '<?php if (get_option("lly_opt_player_playlist") == "") { echo ""; } else { echo get_option("lly_opt_player_playlist"); } ?>',
						responsive: <?php if (get_option("ll_opt_load_responsive") == "1") { echo "false"; } else { echo "true"; } ?>,
						thumbnailquality: '<?php if (get_option("lly_opt_thumbnail_quality") == "") { echo "0"; } else { echo get_option("lly_opt_thumbnail_quality"); } ?>',
						<?php do_action( 'lly_set_options' ); ?>
					});
				});
			</script>
			<?php
		}
	}

}

function initialize_lazyload_youtube() {
	$lazyload_youtube = new Lazyload_Youtube();
}
add_action( 'init', 'initialize_lazyload_youtube' );