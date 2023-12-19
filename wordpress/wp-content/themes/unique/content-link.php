<article <?php hybrid_post_attributes(); ?>>

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
			<?php echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-byline">' . __( '[post-format-link] published on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'unique' ) . '</div>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'unique' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'unique' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { ?>

		<?php if ( get_the_title() ) { ?>

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . hybrid_get_the_post_format_url() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '">', '<span class="meta-nav">&rarr;</span></a></h2>' ); ?>
			</header><!-- .entry-header -->

		<?php } else { ?>

			<div class="entry-content">
				<?php the_content( __( 'Read more &rarr;', 'unique' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'unique' ), 'after' => '</p>' ) ); ?>
			</div><!-- .entry-content -->

		<?php } ?>

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[post-format-link] published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'unique' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } ?>

</article><!-- .hentry -->