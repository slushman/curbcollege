<?php
/**
 * @package curbcollege
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<span class="entry-cats"><?php
			
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'curbcollege' ) );

				$meta_text = __( 'File under: %1$s', 'curbcollege' );

				printf(
					$meta_text,
					$category_list
				);

			?></span><?php

				curbcollege_posted_on();

		?></div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content"><?php

		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'curbcollege' ),
			'after'  => '</div>',
		) );

	?></div><!-- .entry-content -->

	<footer class="entry-meta"><?php

		// add Curb College blurb?
		// 
	
	?></footer><!-- .entry-meta -->
</article><!-- #post-## -->
