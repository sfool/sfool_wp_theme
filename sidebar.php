<?php if (!is_preview() && !is_single()) : ?>
<aside class="adsense">
<h3 class="ad_title">スポンサーリンク</h3>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle my_adslot"
     style="display:inline-block"
     data-ad-client="ca-pub-9935659172823517"
     data-ad-slot="4529484962"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</aside>
<?php endif; ?>

<div id="sub">
<?php get_search_form(); ?>

<?php dynamic_sidebar('side-widget'); ?>
<!-- end #sub -->
</div>