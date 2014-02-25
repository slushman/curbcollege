<?php 
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

$recent = new WP_Query("page_id=48234"); 

while($recent->have_posts()) : 

	$recent->the_post();

	the_content();

endwhile; ?>

</article><?php

get_footer();
?>