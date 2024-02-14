<div class="container custom">

        <div class="row custom-row csrow1">

            <div class="col-md-2 custom-column1 col1s">
            <img src="<?php the_field('image_1'); ?>" alt="Icon 1" class="icon icon1">
                <h5><?php echo get_field('text_5');?></h5>
                <img src="<?php the_field('image_2'); ?>" alt="Icon 1" class="icon icon1">
                <p><?php echo get_field('text_4');?></p>
            </div>


            <div class="col-md-2 custom-column4 new">
            <img src="<?php the_field('image_3'); ?>" alt="Icon 1" class="icon icon1">

                <p><?php echo get_field('text_2');?></p>

                <p><?php echo get_field('text_3');?></p>
            </div>
        </div>


        <div class="col-md-9 custom-column2">
            <div class="custom-space1">
                <img src= "<?php echo get_field('image_4');?>">
                <small><?php echo get_field('text_1');?><a href="#">Get them now</a></small>
            </div>
            <div class="custom-space2">
    <?php
    // Get product categories
    $product_categories = get_terms('product_cat', array('hide_empty' => false, 'number' => 5));

    foreach ($product_categories as $category) :
    ?>
        <h6 class="custom-heading">
            <a href="<?php echo esc_url(get_term_link($category)); ?>">
                <?php echo esc_html($category->name); ?>
            </a>
        </h6>
    <?php endforeach; ?>
</div>

<?php

            echo do_shortcode('[products limit="9" columns="3" orderby="date" order="desc"]');
            ?>

            
        </div>
        

    </div>