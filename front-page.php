<?php get_header(); ?>
	<div class="section site-body">
		<div class="section-inner">
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
		
					<h1><?php the_title(); ?></h1>
		
					<?php edit_post_link('<small>Edit this entry</small>','',''); ?>
					<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
		
					<div class="page-content">
						<?php the_content(); ?>
						<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
					</div><!--#pageContent -->
		
					<div class="page-meta">
						<h3>Written by <?php the_author_posts_link() ?></h3>
						<p>
							Posted on <?php the_time('F j, Y'); ?> at <?php the_time() ?>
						</p>
					</div><!--#pageMeta-->
				</div><!--#post-# .post-->
		
				<?php comments_template( '', true ); ?>
		
			<?php endwhile; ?>
			
			<?php get_sidebar(); ?>

		</div>
	</div><!--#content-->
<?php get_footer(); ?>
