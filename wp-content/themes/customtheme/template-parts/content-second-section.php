<div class="container custom">

    <div class="row custom-row csrow1">

        <div class="col-md-3 custom-column1"> <!-- Adjusted to 30% width -->
            <h4 class="custom-h4">Browse Categories</h4>
            <ul class="list-unstyled">

            <?php
               $product_categories = get_terms('product_cat'); // Fetch WooCommerce product categories
               foreach ($product_categories as $category) {
                     $category_link = get_term_link($category);
                     ?>
                     <li><a class="dropdown-item" href="<?php echo esc_url($category_link); ?>"><i class="fa-brands fa-wordpress me-3"></i><?php echo esc_html($category->name); ?></a></li>
                     <?php
               }
               ?>

            </ul>
        </div>

        <div class="col-md-2 custom-column1 news-letter">
            <div class="news-letter-content">
            <?php echo do_shortcode('[contact-form-7 id="b635691" title="Contact form 1_custom"]'); ?>

            </div>
        </div>
    </div>

    <div class="col-md-9 custom-column2">
        <div class="custom-space">
            <h4 class="custom-space-h4">
                New Products
                <span class="cstmspan"></span>
            </h4>
            <small><a href="#">See all new products</a></small>
        </div>
        <?php
        // Output the WooCommerce products using the shortcode
        echo do_shortcode('[products limit="9" columns="3" orderby="date" order="desc"]');
        ?>
        
    </div>

</div>
