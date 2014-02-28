<?php 
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

		$recent = new WP_Query("page_id=48234"); 

		while($recent->have_posts()) : 

			$recent->the_post();

			the_content();

		endwhile; ?>

		</article>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
?>