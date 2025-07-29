<footer>
    <?php if ($logo = get_theme_mod('footer_logo')) : ?>
        <img src="<?php echo esc_url($logo); ?>" alt="Footer Logo" style="max-height:60px;">
    <?php endif; ?>

    <p>
        <?php echo esc_html(get_theme_mod('footer_text', '© ' . date('Y') . ' InspirePress.')); ?>
    </p>
</footer>

<?php wp_footer(); ?>


<!-- Scroll to Top Button -->
<button id="scrollTopBtn" title="Go to top">↑</button>
<?php wp_footer(); ?>
</body>
</html>

</body>
</html>
