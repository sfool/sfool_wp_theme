<!DOCTYPE html>
<html lang="ja">
<head>
<?php get_template_part('tpl', 'htmlhead'); ?>
<title>検索結果｜<?php echo bloginfo('name'); ?></title>
</head>

<body id="top">

<div id="wrapper">

<?php get_header(); ?>

<div id="main" class="c-wrap_page">
<article class="p-post">

<h2 class="u-text_center">「<?php the_search_query(); ?>」の検索結果</h2>

<?php if (have_posts() && get_search_query()) : ?>

<ul class="ul p-posts">
<?php while (have_posts()) : the_post(); ?>
<li>
<a href="<?php the_permalink(); ?>" class="a p-posts__title"><?php the_title(); ?></a>
<div class="p-posts__info"><span class="p-post_date"><?php echo get_the_date(); ?></span><span class="p-post_category">- <?php the_category(', ') ?></span></div>
</li>
<?php endwhile; ?>
</ul>

<?php get_template_part('tpl', 'postnav'); ?>


<?php else : ?>
<div class="c-wrap_main">
<div class="p-post__body">
<p>検索キーワードに該当する記事が見つかりませんでした。</p>

<!-- end .p-post__body -->
</div>
<!-- end .c-wrap_main -->
</div>

<?php endif; ?>

<?php get_template_part('tpl', 'adsense'); ?>


<!-- end .p-post -->
</article>

<!-- end #main -->
</div>

<?php get_footer(); ?>

<!-- end #wrapper -->
</div>

<?php get_template_part('tpl', 'javascript'); ?>
<?php wp_footer(); ?>
</body>
</html>