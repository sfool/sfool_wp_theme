<?php get_header(); ?>

<div id="contents">
<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('tpl', 'post_body_1'); ?>

<?php endwhile; ?>

<?php get_template_part('tpl', 'posts_link_1'); ?>

<?php else : ?>
<p>記事が見つかりませんでした。</p>
<?php endif; ?>

<!-- end #main -->
</div>

<?php get_sidebar(); ?>
<!-- end #contents -->
</div>

<?php get_footer(); ?>