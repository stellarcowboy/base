<div class="post-meta">
	<p>
		Posted on <?php the_time('F j, Y'); ?> at <?php the_time() ?>
	</p>
	<p>
		<?php comments_popup_link('No comments', 'One comment', '% comments', 'comments-link', 'Comments are closed'); ?> 
	</p>
	<p>
		Categories: <?php the_category(', ') ?>
		<br />
		<?php the_tags('Tags: ', ', ', ' '); ?>
	</p>
	<p>
		Recieve new post updates: <a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow">Entries (RSS)</a>
		<br />
		Recieve follow up comments updates: <?php comments_rss_link('RSS 2.0'); ?>
	</p>
</div><!--#post-meta-->