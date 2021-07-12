<?php get_template_part('includes/header-page');

if( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
endif;
?>
<?php get_template_part('includes/footer-page') ?>