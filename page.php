<?php get_header(); ?>

<div id="contents">
<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post">
<div class="post_body">
<h1><?php the_title(); ?></h1>

<?php the_content('続きを読む &raquo;'); ?>
<!-- end  .post_body -->
</div>

<!-- end .post -->
</article>
<?php endwhile; ?>

<?php else : ?>
<p>記事が見つかりませんでした。</p>
<?php endif; ?>

<!-- end #main -->
</div>

<?php get_sidebar(); ?>
<!-- end #contents -->
</div>

<?php get_footer(); ?>
