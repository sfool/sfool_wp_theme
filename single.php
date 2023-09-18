<!DOCTYPE html>
<html lang="ja">
<head>
<?php get_template_part('tpl', 'htmlhead'); ?>
<title><?php wp_title('｜', true, 'right'); ?><?php bloginfo('name'); ?></title>
</head>

<body id="top">
<?php get_template_part('tpl', 'gtmnoscript'); ?>

<div id="wrapper">

<?php get_header(); ?>

<div id="main" class="c-wrap_page">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="p-post">

<div class="p-post__header">
<div class="p-post_title">
<h1 class="h1"><?php the_title(); ?></h1>

<div class="p-post_info"><span class="p-post_date"><?php echo get_the_date(); ?></span><span class="p-post_category">- <?php the_category(', ') ?></span></div>

<!-- end .p-post_title -->
</div>
<!-- end .p-post__header -->
</div>


<div class="c-wrap_main">
<div class="p-post__body">

<?php the_content(); ?>

<!-- end .p-post__body -->
</div>

<?php
$blog_name_encode = urlencode(get_bloginfo('name'));
$url_encode = urlencode(get_permalink());
$title_encode = urlencode(get_the_title());
$share_text = $title_encode . '｜' . $blog_name_encode;
?>

<ul class="ul p-post__sns">
<li class="p-post__sns__x"><a href="<?php echo esc_url('https://twitter.com/intent/tweet?url=' . $url_encode . '&amp;text=' . $share_text); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/ico_x.svg" alt="Twitter"></a></li>
<li class="p-post__sns__facebook"><a href="<?php echo esc_url('http://www.facebook.com/share.php?u=' . $url_encode); ?>" rel="nofollow" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/ico_facebook.svg" alt="Facebook"></a></li>
<li class="p-post__sns__hatena"><a href="<?php echo esc_url('http://b.hatena.ne.jp/add?mode=confirm&amp;url=' . $url_encode . '&amp;title=' . $share_text); ?>" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/assets/img/ico_hatenabookmark.svg" alt="はてなブックマーク"></a></li>
</ul>

<?php get_template_part('tpl', 'adsense'); ?>

<?php get_template_part('tpl', 'postnav'); ?>

<?php comments_template(); ?>

<!-- end .c-wrap_main -->
</div>
<!-- end .p-post -->
</article>


<?php endwhile; ?>

<?php else : ?>
<p>記事が見つかりませんでした。</p>
<?php endif; ?>


<!-- end #main -->
</div>

<?php get_footer(); ?>

<!-- end #wrapper -->
</div>

<?php get_template_part('tpl', 'javascript'); ?>
<?php wp_footer(); ?>
</body>
</html>