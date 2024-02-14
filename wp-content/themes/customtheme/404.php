<?php get_header(); ?>
<div class="container">
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'your-theme-text-domain'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'your-theme-text-domain'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>

    </main>
</div>
</div>

<?php get_footer(); ?>
