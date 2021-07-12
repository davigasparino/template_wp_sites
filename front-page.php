<?php get_header();
    get_template_part('includes/sliders');
	
	if( have_posts() ){
		while ( have_posts() ) {
			the_post();
			echo '<a href="' . get_permalink() . '">';
				echo get_the_post_thumbnail( $post->ID, 'primeiroteste', array(
					'title' => 'nome da imagem que você quiser',
					'alt' => 'nome da imagem que você quiser',
					'class' => 'teste-de-class'
				) );
				echo get_the_title();
			echo '</a>';
			echo '<hr />';
		}
	}else{
		echo 'nenhum post no momento';
	}

	get_footer();
?>