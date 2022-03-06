<?php
/**
 * Custom template tags for patricia theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package patricia-blog
 */

/**
 * Filter the except length characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'patricia_blog_custom_excerpt_length' ) ) :

function patricia_blog_custom_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
	return get_theme_mod('patricia_blog_entry_excerpt', '23');
}
add_filter( 'excerpt_length', 'patricia_blog_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'patricia_blog_excerpt_more' ) ) :

function patricia_blog_excerpt_more( $more ) {
   if ( is_admin() ) return $more;
   return '&hellip;';
}
add_filter( 'excerpt_more', 'patricia_blog_excerpt_more' );

endif;

// Url Encode
function patricia_blog_url_encode($title)
{
    $title = html_entity_decode($title);
    $title = urlencode($title);
    return $title;
}

if ( ! function_exists( 'patricia_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function patricia_blog_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
		esc_attr( get_the_date( get_option('date_format') ) ),
		esc_html( get_the_date(get_option('date_format')) )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date' ),
			'' .$time_string. ''
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'patricia_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function patricia_blog_posted_by() {

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'patricia-blog' ),
			'<span class="author vcard mr-auto">
			<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
	
		echo '<span class="byline"> ' . $byline .'&nbsp'. '</span>'; // WPCS: XSS OK.

	}
endif;

// Comment Layout
function patricia_blog_custom_comment($comment, $args, $depth) {
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content">
			<?php printf( '<h4 class="author-name">%s</h4>', get_comment_author_link() ); ?>
			<span class="date-comment">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				  <time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( esc_html__( '%1$s at %2$s ', 'patricia-blog' ), get_comment_date(), get_comment_time() ); ?>
				  </time>
				</a>
			</span>
			<div class="reply">
				<?php edit_comment_link( esc_html__( '(Edit)', 'patricia-blog' ), '  ', '' );?>
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'patricia-blog' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Footer info, copyright information
 */
if ( ! function_exists( 'patricia_blog_footer' ) ) :
function patricia_blog_footer() {
	
   $site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

   $wp_link = '<a href="' . esc_url( __( "https://wordpress.org/", 'patricia-blog')) .'" target="_blank" title="' . esc_attr__( 'WordPress', 'patricia-blog' ) . '"><span>' . __( 'WordPress', 'patricia-blog' ) . '</span></a>';
   
   $tg_link = '<a href="' . esc_url("https://volthemes.com").'" target="_blank" title="'.esc_attr__( 'VolThemes', 'patricia-blog' ).'"><span>'.__( 'VolThemes', 'patricia-blog') .'</span></a>';

   $default_footer_value = 
   /* translators: 1: year, 2: sitename */
   sprintf( __( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'patricia-blog' ), date_i18n( __( 'Y' , 'patricia-blog' ) ), $site_link ).'<br>'.sprintf( __( 'Theme: %1$s by %2$s.', 'patricia-blog' ), 'Patricia', $tg_link ).' '.sprintf( __( 'Powered by %s.', 'patricia-blog' ), $wp_link );

   $patricia_blog_footer = '<div class="copyright">'.$default_footer_value.'</div>';
   echo wp_kses_post($patricia_blog_footer);
   
}
endif;
add_action( 'patricia_blog_footer', 'patricia_blog_footer', 10 );

/**
 * Flush out the transients used in patricia_blog_categorized_blog.
 */
function patricia_blog_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'patricia_blog_categories' );
}
add_action( 'edit_category', 'patricia_blog_category_transient_flusher' );
add_action( 'save_post',     'patricia_blog_category_transient_flusher' );