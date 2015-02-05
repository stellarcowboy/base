<?php get_header(); ?>
	<div class="section site-body">
		<div class="section-inner">
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
	
						<div class="post-content">
							<?php the_content(); ?>
							<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
						</div><!--#post-content-->
						
						<?php get_template_part('partials/post-meta'); ?>
						<?php get_template_part('partials/post-author'); ?>
						
						
					</div><!-- #post-## -->
	
					<div class="newer-older">
						<div class="older">
							<p>
								<?php previous_post_link('%link', '&laquo;&nbsp;Previous Post') ?>
							</p>
						</div><!--.older-->
						<div class="newer">
							<p>
								<?php next_post_link('%link', 'Newer post&nbsp;&raquo;') ?>
							</p>
						</div><!--.newer-->
					</div><!--.newer-older-->
	
					<?php comments_template( '', true ); ?>
		
			<?php endwhile; ?><!--end loop-->
			
			<?php get_sidebar(); ?>
			
		</div><!--#content-->
	</div>
<?php get_footer(); ?>