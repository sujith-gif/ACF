<div class="container mt-4 mt4container">
        <div class="row">
            <div class="col-md-6">
            <p class="text-muted small ne"><?php echo get_field('_christmas_sale_message'); ?></p>
                <h1 class="h1-custom"><?php echo get_field('main_title')?></h1>
                <div class="input-group mb-3">
                <?php
                $search_input_placeholder = get_field('search_input_placeholder');
                ?>

                <input type="text" class="form-control" placeholder="<?php echo esc_attr($search_input_placeholder); ?>" aria-label="Search" aria-describedby="searchButton">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn1" type="button" id="searchButton">Search</button>
                </div>
            </div>
                <p class="text-muted small"><?php echo get_field('home_page_sub_title')?></p>
            </div>



            <div class="col-md-6 border-column">
                <div class="row border-shadow background-image">
                <img src="<?php echo get_field('main_img');?>" class="img-fluid">


                </div>
            </div>
        </div>
        <div class="text-above-icons">
            <h6><?php echo get_field('subtitle1');?></h6>
        </div>
        <div class="svg-icons">
    <?php
    // Assuming you're inside the loop or have access to the post ID
    $post_id = get_the_ID();

    // Get the repeater field data for 'iconimages'
    $icon_images = get_field('iconimages', $post_id);

    // Check if the repeater field has values
    if ($icon_images) {
        foreach ($icon_images as $icon_image) {
            // Get the image URL for 'img1' subfield
            $img1_url = $icon_image['img1'];

            // Check if the image URL exists
            if ($img1_url) {
                echo '<img src="' . esc_url($img1_url) . '" alt="Icon Image">';
            }
        }
    }
    ?>
</div>


    </div>