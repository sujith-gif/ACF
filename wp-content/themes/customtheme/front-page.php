<?php
// Template Name: Your Custom Template
get_header(); // Include the header.php file
?>
<?php
get_template_part('template-parts/content', 'first-section');
get_template_part('template-parts/content', 'second-section');
get_template_part('template-parts/content', 'third-section');
get_template_part('template-parts/content', 'footer-upper-section');
?>
<?php
get_footer(); // Include the footer.php file
?>