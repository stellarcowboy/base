<?php get_header(); ?>

	<div class="section site-body">
		<div class="section-inner">
	
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
					<h1><?php the_title(); ?></h1>
		
					<div class="page-content">
						<?php the_content(); ?>
					</div><!--#pageContent -->
				
			<?php endwhile; ?>

			<?php get_sidebar(); ?>

		</div>
	</div><!--#content-->
<?php get_footer(); ?>
