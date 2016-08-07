<?php
get_header();
	while(have_posts()): the_post();
?>
	<h1><?php the_title(); ?></h1>
<?php
		if(has_post_thumbnail()){
			the_post_thumbnail('medium');
		}
		the_excerpt();
?>
		<a href="<?php the_permalink(); ?>" ><?php __("Read more...","gexcel"); ?></a>
<?php endwhile;
//Pagination
the_posts_pagination( array(
				'prev_text'          => __( 'Previous ', 'gexcel' ),
				'next_text'          => __( 'Next ', 'gexcel' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gexcel' ) . ' </span>',
			) );
get_footer();
?>