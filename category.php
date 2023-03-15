<!DOCTYPE html>
<html lang="ja">
<head>
<?php get_template_part('tpl', 'htmlhead'); ?>
<title><?php single_cat_title(); ?>｜<?php echo bloginfo('name'); ?></title>
</head>

<body id="top">
<?php get_template_part('tpl', 'gtmnoscript'); ?>

<div id="wrapper">

<?php get_header(); ?>

<div id="main" class="c-wrap_page">

<?php if (have_posts()) : ?>

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
<p>記事が見つかりませんでした。</p>
<?php endif; ?>

<?php get_template_part('tpl', 'adsense'); ?>

<!-- end #main -->
</div>

<?php get_footer(); ?>

<!-- end #wrapper -->
</div>

<?php get_template_part('tpl', 'javascript'); ?>
<?php wp_footer(); ?>
</body>
</html>