<?php get_header(); ?>

<div class="content-wrap">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">

			<h1><?php the_title(); ?></h1>

			<div class="page-content">
				<?php the_content(); ?>
			</div><!--#pageContent -->

		</div><!--#post-#-->

	<?php endwhile; ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
