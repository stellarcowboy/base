<?php get_header(); ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; ?>
			<div class="post-content">
				<?php the_content(__('Read more'));?>
			</div>
			<div class="post-meta">
				<p>
					Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
				</p>
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
				<?php next_posts_link('Previous Posts <span></span>'); ?>
			</div><!--.older-->
			<div class="newer">
				<?php previous_posts_link('<span></span> Newer posts'); ?>
			</div><!--.older-->
		</div><!--.newer-older-->
			
	</div><!--#content-->
<?php get_footer(); ?>