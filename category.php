<?php get_header(); ?>

<div class="content-wrap">
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

		<div class="post-meta">
			<p>
				<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
				<br />
				Categories: <?php the_category(', ') ?>
				<br />
				<?php if (the_tags('Tags: ', ', ', ' ')); ?>
			</p>
		</div><!--.postMeta-->
		
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
	
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>