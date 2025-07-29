<?php
/*
Template Name: Homepage
*/
get_header();
?>

<!-- ✅ Animation Wrapper -->
<div class="page-reveal">

    <!-- ✅ Hero Section -->
    <section class="hero">
        <h1><?php bloginfo('description'); ?></h1>
        <?php if ($hero = get_theme_mod('hero_image')) : ?>
            <img src="<?php echo esc_url($hero); ?>" alt="Hero Image">
        <?php endif; ?>
    </section>

    <!-- ✅ Latest 3 Blog Posts -->
    <section class="blog-grid">
        <?php
        $latest_posts = new WP_Query(['posts_per_page' => 3]);
        while ($latest_posts->have_posts()) : $latest_posts->the_post();
        ?>
            <article>
                <?php if (has_post_thumbnail()) : ?>
                    <div><?php the_post_thumbnail('medium'); ?></div>
                <?php endif; ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <!-- ✅ CTA Button -->
    <div class="cta-button">
        <?php echo do_shortcode('[inspire_button text="Explore Projects" url="' . home_url('/projects/') . '"]'); ?>
    </div>

</div> <!-- .page-reveal -->

<?php get_footer(); ?>
