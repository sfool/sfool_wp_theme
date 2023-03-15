<!DOCTYPE html>
<html lang="ja">
<head>
<?php get_template_part('tpl', 'htmlhead'); ?>
<title><?php wp_title('｜', true, 'right'); ?><?php echo bloginfo('name'); ?></title>
</head>

<body id="top">
<?php get_template_part('tpl', 'gtmnoscript'); ?>

<div id="wrapper">

<?php get_header(); ?>

<div id="main" class="c-wrap_page">
<article class="p-post">

<div class="p-post__header">
<div class="p-post_title">
<h1 class="h1"><div class="p-pixel_mplus_12">404<div class="u-font_sm">ただの えらーぺーじの ようだ</div></div></h1>
<!-- end .p-post_title -->
</div>
<!-- end .p-post__header -->
</div>


<div class="c-wrap_main">
<div class="p-post__body">

<p>
申し訳ございません。お探しのページは見つかりませんでした。<br>
サイト内検索をしていただくと、ページが見つかるかもしれません。
</p>

<!-- end .p-post__body -->
</div>
<!-- end .c-wrap_main -->
</div>
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