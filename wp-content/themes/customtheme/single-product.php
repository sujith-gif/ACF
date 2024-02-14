<?php
get_header();
?>

<div class="container mt-5 mt-md-6">
    <?php
    while (have_posts()) :
        the_post();
        wc_get_template_part('content', 'single-product');
    endwhile;
    ?>
</div>

<?php
get_footer(); // Include the footer.php file
?>
