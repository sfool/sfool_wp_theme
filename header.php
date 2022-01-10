<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="keywords" content="web,ブログ,<?php if ( is_home() ) { ?>sfool<?php } elseif ( is_category() ) { ?><?php single_cat_title(); ?><?php } elseif ( is_tag() ) { ?><?php single_tag_title();?><?php } elseif ( is_search() ) { ?><?php echo the_search_query(); ?><?php } elseif ( is_page() ) { ?><?php wp_title(''); ?><?php } elseif ( is_single() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php wp_title(''); ?>,<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?><?php endwhile; ?><?php else : ?><?php endif; ?><?php } ?>">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,print">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">

<title><?php echo blogTitle(); if (!is_home()) { echo "｜" . get_bloginfo('name'); } ?></title>

<?php
wp_deregister_script('jquery');
wp_head();
?>
</head>

<body id="pagetop">
<header id="header">
<div id="header_inner">

<div id="logo_area">
<h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
<h2><?php bloginfo('description'); ?></h2>
<!-- end #logo_area -->
</div>

<!-- end #header_inner -->
</div>
<!-- end #header -->
</header>
