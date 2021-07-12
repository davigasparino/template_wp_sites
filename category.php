<?php get_template_part('includes/header-page');

	if( have_posts() ) :
		while ( have_posts() ) :
			the_post();
?>
			<a href="<?echo get_permalink(); ?>">
			<?php echo the_title(); ?>
			</a>
			<br />
<?php
		endwhile;
		echo paginate_links();
	endif;
?>
<?php get_template_part('includes/footer-page') ?>