<?php
?>
<footer class="container-fluid">
    <div class="container">
        <div class="row footer">
            <?php
            for ($i = 1; $i <= 4; $i++) {
                dynamic_sidebar('footer-widget-' . $i);
            }
            ?>
        </div>
    </div>
    <div class="footer-menu">

    </div>
</footer>
<hr>
<div class="container">
    <?php
    // Display the footer menu
    wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu_class'     => 'footer',
    ));
    ?>
    <div class="row">
        <hr class="my-4">

        <div class="col-md-6 copyright-column">
            <?php dynamic_sidebar('copyright-widget-area'); ?>

        </div>
        <div class="col-md-6 social-icons-column">
            <?php dynamic_sidebar('social-icons-widget-area'); ?>
        </div>

    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>