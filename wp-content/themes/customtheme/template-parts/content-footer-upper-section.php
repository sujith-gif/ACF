<div class="container-fluid container-apps-websites">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-apps-websites">
                <h2 class="h2-apps-websites"><?php the_field('footer_upper_main_title'); ?></h2>
                <p><?php the_field('footer_upper_sub_title'); ?></p>
                <div class="spacer">
                    <a href="http://localhost/ACF/contact/" class="btn btn-primary btn-contact"><?php echo get_field('contact_us_button_text');  ?></a>
                    <p><a href="#" class="link-portfolio"><?php echo get_field('text_link_text');?></a></p>
                </div>
            </div>

            <div class="col-md-4">
                <img src="<?php echo esc_url(get_field('img_1')); ?>" alt="Image 1" class="img-fluid img-fluid-apps">
            </div>

            <div class="col-md-4">
                <img src="<?php echo esc_url(get_field('img_2')); ?>" alt="Image 2" class="img-fluid img-fluid-group">
            </div>
        </div>
    </div>
</div>