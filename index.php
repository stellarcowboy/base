<?php get_header(); ?>
	<div class="section site-body">
		<div class="section-inner">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
				<div class="post-content">
					<?php the_content(__('Read more'));?>
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
					<?php next_posts_link('Previous Posts <span></span>'); ?>
				</div><!--.older-->
				<div class="newer">
					<?php previous_posts_link('<span></span> Newer posts'); ?>
				</div><!--.older-->
			</div><!--.newer-older-->
			
		</div>			
	</div><!--#content-->
<?php get_footer(); ?>