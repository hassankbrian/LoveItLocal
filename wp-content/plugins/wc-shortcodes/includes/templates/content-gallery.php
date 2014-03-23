<?php $classes[] = 'wc-shortcodes-post-box'; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="wc-shortcodes-post-border">
		<?php if ( get_post_gallery() ) : ?>
			<?php $gallery = get_post_gallery( get_the_ID(), false ); ?>
            
			<div class="rslides-wrapper">
				<ul class="rslides">
				<?php foreach( $gallery['src'] as $src ) : ?>

					<li><a href="<?php the_permalink(); ?>"><img src="<?php echo $src; ?>" class="" alt="" /></a></li>

				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<div class="wc-shortcodes-post-content">
			<?php if ( $atts['title'] ) : ?>
			<div class="wc-shortcodes-entry-header">
				<<?php echo $atts['heading_type']; ?> class="wc-shortcodes-entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</<?php echo $atts['heading_type']; ?>>
			</div><!-- .entry-header -->
			<?php endif; ?>

			<?php if ( $atts['content'] ) : ?>
			<div class="wc-shortcodes-entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php endif; ?>

			<?php include('entry-meta.php'); ?>

		</div><!-- .wc-shortcodes-post-content -->
	</div><!-- .wc-shortcodes-post-border -->
</div><!-- #post -->
