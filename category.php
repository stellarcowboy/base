<?php get_header(); ?>
	<div class="section site-body">
		<div class="section-inner">
			
			<h1><?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
			<!-- displays the category's description from the Wordpress admin -->
			<?php echo category_description(); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
		
				<p>
					Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
				</p>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		
				<?php get_template_part('partials/post-meta'); ?>
				
			<?php endwhile; else: ?>
				<div class="no-results">
						<p>
							We're sorry, no results were found.
						</p>
				</div><!--noResults-->
			<?php endif; ?>
				
			<div class="newer-older">
				<div class="older">
					<?php previous_posts_link('<span></span> Previous Posts'); ?>
				</div><!--.older-->
				<div class="newer">
					<?php next_posts_link('Newer posts <span></span>'); ?>
				</div><!--.older-->
			</div><!--.newer-older-->

			<?php get_sidebar(); ?>
			
		</div>
	</div><!--#content-->
<?php get_footer(); ?>