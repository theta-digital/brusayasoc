<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0.14
 */
$justitia_header_video = justitia_get_header_video();
$justitia_embed_video  = '';
if ( ! empty( $justitia_header_video ) && ! justitia_is_from_uploads( $justitia_header_video ) ) {
	if ( justitia_is_youtube_url( $justitia_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $justitia_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		global $wp_embed;
		if ( false && is_object( $wp_embed ) ) {
			$justitia_embed_video = do_shortcode( $wp_embed->run_shortcode( '[embed]' . trim( $justitia_header_video ) . '[/embed]' ) );
			$justitia_embed_video = justitia_make_video_autoplay( $justitia_embed_video );
		} else {
			$justitia_header_video = str_replace( '/watch?v=', '/embed/', $justitia_header_video );
			$justitia_header_video = justitia_add_to_url(
				$justitia_header_video, array(
					'feature'        => 'oembed',
					'controls'       => 0,
					'autoplay'       => 1,
					'showinfo'       => 0,
					'modestbranding' => 1,
					'wmode'          => 'transparent',
					'enablejsapi'    => 1,
					'origin'         => home_url(),
					'widgetid'       => 1,
				)
			);
			$justitia_embed_video  = '<iframe src="' . esc_url( $justitia_header_video ) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?>
		<div id="background_video"><?php justitia_show_layout( $justitia_embed_video ); ?></div>
		<?php
	}
}
