<?php get_header(); ?>
	<div class="section site-body">
		<div class="section-inner">
	
			<h1><?php printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
			<!-- displays the tag's description from the Wordpress admin -->
			<?php echo tag_description(); ?>
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		
				<?php get_template_part('partials/post-meta'); ?>

				
			<?php endwhile; else: ?>
				<div class="no-results">
					<p>
						<strong>There has been a glitch in the Matrix.</strong>
						<br />
						There is nothing to see here.
					</p>
					<p>
						We apologize for any inconvenience, please try somewhere else.
					</p>
				</div><!--noResults-->
			<?php endif; ?>
				
			<div class="newer-older">
				<div class="older">
					<p>
						<?php next_posts_link('&laquo; Older Entries') ?>
					</p>
				</div><!--.older-->
				<div class="newer">
					<p>
						<?php previous_posts_link('Newer Entries &raquo;') ?>
					</p>
				</div><!--.older-->
			</div><!--.newer-older-->
			<?php get_sidebar(); ?>
			
		</div>
	</div><!--#content-->
<?php get_footer(); ?>