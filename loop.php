<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail_size' ); ?>
		<?php endif; ?>

		<div class="blogWrapper flex">
			<div class="featureImg" style="background: url('<?php echo $image[0]; ?>') no-repeat; background-size: cover;">
				<!-- <img src="http://placehold.it/100x100" alt=""> -->
			</div>

		
			<div class="articleWrapper">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title accentBorder">
		        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
		          <?php the_title(); ?>
		        </a>
		      </h2>

					<section class="entry-content">
						<?php the_excerpt(); ?>
						<?php wp_link_pages( array(
		          'before' => '<div class="page-link"> Pages:',
		          'after' => '</div>'
		        )); ?>
					</section><!-- .entry-content -->

					<footer>
						<p class="postLink"><?php //the_tags('Tags: ', ', ', '<br>'); ?> Posted in <?php the_category(', '); ?> &#8226; <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?> &#8226; <?php comments_popup_link('Respond to this post &raquo;', '1 Response &raquo;', '% Responses &raquo;'); ?></p>
		        <p></p>
		        <p></p>
					</footer>

				</article><!-- #post-## -->
			</div>
		
	</div>
		<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
