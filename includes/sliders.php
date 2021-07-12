<div class="slider-content-home">
    <div class="container">
        <div class="owl-carousel">
        <?php
            $get_posts = get_posts(array('post_per_page' => -1, 'post_type' => 'sliders'));
            if($get_posts):
                foreach ($get_posts as $slider) :
                    $link = get_post_meta($slider->ID, 'slider-link', true);
                    $naba = get_post_meta($slider->ID, 'slider-link-blank', true);
        ?>
            <div class="slider-container">
                <?php if($link) : ?>
                <a href="<?php echo $link; ?>" title="<?php echo $slider->post_title; ?>"
                 <?php echo ($naba ? ' target="_blank"' : ''); ?>>
                <?php
                    endif;
                    echo get_the_post_thumbnail($slider->ID, 'full', '');

                    if($link): ?>
                </a>
                    <?php endif; ?>
            </div>
        <?php
                endforeach;
            endif;
        ?>
        </div>
    </div>
</div>