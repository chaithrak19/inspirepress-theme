<?php get_header(); ?>

<div class="content-with-sidebar">
    <main class="main-content">
        <h1><?php the_archive_title(); ?></h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </main>

    <?php if ( get_theme_mod('display_sidebar', true) && is_active_sidebar('blog-sidebar') ) : ?>
        <aside class="blog-sidebar">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </aside>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
