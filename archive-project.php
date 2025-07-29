<?php get_header(); ?>

<main class="project-archive" style="padding: 40px;">
    <h1 style="text-align: center;">Our Projects</h1>
    
    <div class="project-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="project-card fade-in-top">

                
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: 15px;">
                        <?php the_post_thumbnail('medium', ['style' => 'max-width: 100%; border-radius: 8px;']); ?>
                    </div>
                <?php endif; ?>

                <h2><?php the_title(); ?></h2>

                <?php
                    $project_url = get_post_meta(get_the_ID(), '_project_url', true);
                    if ($project_url):
                ?>
                    <a href="<?php echo esc_url($project_url); ?>" target="_blank" class="project-btn" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; transition: background 0.3s;">
                        Visit Project 🚀
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; else : ?>
            <p>No projects found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
