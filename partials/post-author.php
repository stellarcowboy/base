<!-- If a user fills out their bio info, it's included here -->
<div class="post-author">
	<h3>Written by <?php the_author_posts_link() ?></h3>
	<div id="author-gravatar">
		<!-- This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address -->
		<?php echo get_avatar( $curauth->user_email, $default = '<path_to_url>' ); ?>
	</div><!--#author-gravatar -->
	<div id="authorDescription">
		<?php the_author_meta('description') ?> 
		<div id="author-link">
			<p>View all posts by: <?php the_author_posts_link() ?></p>
			
		</div><!--#author-link-->
	</div><!--#author-description -->
</div><!--#post-author-->
