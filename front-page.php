<!DOCTYPE html>
<html lang="ja">
<head>
<?php get_template_part('tpl', 'htmlhead'); ?>
<title><?php echo bloginfo('name'); ?></title>
</head>

<body id="top">

<?php if(is_front_page() && is_home() && !is_paged()) : ?>
<div id="p-page_loading">
<div class="p-page_loading__loader"><div class="p-page_loading__spinner"></div></div>
<script type="text/javascript">
document.getElementById('p-page_loading').classList.add('init');
document.getElementsByTagName('body')[0].classList.add('u-overflow_hidden');
</script>
</div>
<?php endif; ?>

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