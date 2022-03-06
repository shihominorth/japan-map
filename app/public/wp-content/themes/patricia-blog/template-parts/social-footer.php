<?php if (get_theme_mod('patricia_blog_footer_social', 1) == 1) : ?>
	<div class="social-footer">
		<?php if(get_theme_mod('patricia_blog_facebook')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_facebook') ); ?>" target="_blank" title="<?php esc_attr_e( 'Facebook', 'patricia-blog' ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_blog_twitter')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_twitter') ); ?>" target="_blank" title="<?php esc_attr_e( 'Twitter', 'patricia-blog' ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_blog_linkedin')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_linkedin') ); ?>" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'patricia-blog' ); ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_blog_pinterest')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_pinterest') ); ?>" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'patricia-blog' ); ?>"><i class="fab fa-pinterest" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_blog_instagram')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_instagram') ); ?>" target="_blank" title="<?php esc_attr_e( 'Instagram', 'patricia-blog' ); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_blog_youtube')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_blog_youtube') ); ?>" target="_blank" title="<?php esc_attr_e( 'YouTube', 'patricia-blog' ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a><?php endif; ?>	
	</div>
<?php endif; ?>