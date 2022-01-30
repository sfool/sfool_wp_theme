<footer class="footer">
<div class="footer__inner c-wrap_page">

<div class="footer__contents">
<div class="p-search_form_area">
<form method="get" class="p-search_form"
action="<?php echo esc_url( home_url('/') ); ?>">
<input type="search" placeholder="サイト内検索" name="s" class="p-search_field" value="">
<button type="submit" class="button p-search_submit"></button>
</form>
<!-- end .p-search_form_area -->
</div>
<!-- end .footer__contents -->
</div>

<div class="footer__contents">
<div class="footer__cols_01">

<div class="footer__col_01">
<h3 class="h3 footer__title">CATEGORY</h3>
<!-- end .footer__col_01 -->
</div>

<div class="footer__col_02">

<ul class="ul footer__categories">
<?php
$categories = get_categories();

foreach ($categories as $val) :
	$categoryLink = get_category_link($val->cat_ID);
	$categoryName = $val->name;
?>
<li><a href="<?php echo $categoryLink; ?>"><?php echo $categoryName; ?></a></li>
<?php endforeach; ?>
</ul>

<!-- end .footer__col_02 -->
</div>

<!-- end .footer__cols_01 -->
</div>
<!-- end .footer__contents -->
</div>

<div class="footer__contents">
<div class="footer__cols_01">

<div class="footer__col_01">
<h3 class="h3 footer__title">ABOUT</h3>
<!-- end .footer__col_01 -->
</div>

<div class="footer__col_02">
<div class="footer__profile">
<div class="footer__profile_img"><img src="<?php bloginfo('template_url'); ?>/assets/img/bird.jpg" alt="著者近影"></div>
<div class="footer__profile_body">
<div class="footer__profile_name">yh</div>
<div class="footer__profile_job p-pixel_mplus_12">うぇぶのせんし</div>
<div class="footer__profile_textarea">
<p>
Webの世界で終わらない戦いをしています。<br>
このブログでは日々の戦いで得たモノをアウトプットしています。
</p>
<!-- end .footer__profile_textarea -->
</div>
<!-- end .footer__profile_body -->
</div>

<!-- end .footer__profile -->
</div>
<!-- end .footer__col_02 -->
</div>

<!-- end .footer__cols_01 -->
</div>
<!-- end .footer__contents -->
</div>


<div class="footer__contents footer__bottom">

<h3 class="h3 footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="SFOOL"></a></h3>


<ul class="ul footer__links">
<li><a href="https://twitter.com/yh_sfool" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/ico_twitter.svg" alt="Twitter"></a></li>
<li><a href="<?php bloginfo('atom_url'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/ico_rss.svg" alt="RSS"></a></li>
</ul>


<!-- end .footer__contents -->
</div>


<p class="footer__copyright">&copy; SFOOL</p>


<!-- end .footer__inner -->
</div>


<div class="footer__pagetop">
<a href="#top">PAGE TOP</a>
<!-- end .footer__pagetop -->
</div>

<!-- end .footer -->
</footer>