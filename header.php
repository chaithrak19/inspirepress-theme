<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ✅ Accessible Site Header -->
<header role="banner">
    <!-- 🌓 Dark Mode Toggle Button (top right) -->
    <button id="darkModeToggle" class="dark-toggle" aria-label="Toggle Dark Mode">🌓</button>

    <h1>
        <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
    </h1>
    <p><?php bloginfo('description'); ?></p>

    <nav role="navigation" aria-label="Main Menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false,
            'menu_class'     => '', // WordPress will generate the <ul>
        ]);
        ?>
    </nav>
</header>
