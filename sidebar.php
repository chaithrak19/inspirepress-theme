<?php
$show_sidebar = get_theme_mod('show_sidebar', true);

if ($show_sidebar && (is_home() || is_archive() || is_single())) :
    if (is_active_sidebar('blog-sidebar')) : ?>
        <aside class="blog-sidebar" role="complementary" aria-label="Blog Sidebar">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </aside>
    <?php endif;
endif;
?>
