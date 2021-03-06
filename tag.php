<?php get_header(); ?>

<div id="contents">

<h2 class="arvhivettl">タグ：[&#160;<?php single_tag_title(); ?>&#160;]の記事一覧</h2>

<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('tpl', 'post_body_01'); ?>

<?php endwhile; ?>

<?php get_template_part('tpl', 'posts_link_01'); ?>

<?php else : ?>
<p>記事が見つかりませんでした。</p>
<?php endif; ?>

<!-- end #main -->
</div>

<?php get_sidebar(); ?>
<!-- end #contents -->
</div>

<?php get_footer(); ?>
