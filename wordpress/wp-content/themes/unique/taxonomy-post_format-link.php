<?php get_header(); // Loads the header.php template. ?>

	<div id="content" class="hfeed">

		<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

		<?php if ( have_posts() ) : ?>

			<article class="hentry">

				<div class="entry-content">

					<ul class="xoxo links">

					<?php while ( have_posts() ) : the_post(); ?>

						<li>
							<a class="permalink" href="<?php echo hybrid_get_the_post_format_url(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
							<a href="<?php the_permalink(); ?>"><?php echo comments_open() ? get_comments_number() : '&#8734;'; ?></a>
						</li>

					<?php endwhile; ?>

					</ul><!-- .xoxo .links -->

				</div><!-- .entry-content -->

			</article><!-- .hentry -->

		<?php else : ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>