<?php get_header(); ?>
<div id="content" class="search">

	<h1><?php the_search_query(); ?></h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php echo '<div class="featuredThumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
		<p>
			Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
		</p>

		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div><!--.post-excerpt-->

	<?php endwhile; else: ?>
		<div class="no-results">
			<h2>Sorry, no results were found</h2>
			<p>
				Please try another search term.
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
	
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
