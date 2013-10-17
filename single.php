<?php get_header(); ?>

<div id="contents">
<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="post">

<div class="post_body">
<p class="date"><span><?php echo get_the_date(); ?>　Category：<?php the_category(', ') ?></span></p>

<h1><!-- zenback_title_begin --><?php the_title(); ?><!-- zenback_title_end --></h1>


<!-- zenback_body_begin --><?php the_content(); ?><!-- zenback_body_end -->


<?php if (!is_preview()) : ?>
<aside class="adsense">
<h3 class="ad_title">スポンサーリンク</h3>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle my_adslot"
     style="display:inline-block"
     data-ad-client="ca-pub-9935659172823517"
     data-ad-slot="3796284961"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</aside>

<div id="zenback_area">
<!-- zenback_date <?php echo get_post_time('Y-m-d') ?> -->
<!-- X:S ZenBackWidget --><script type="text/javascript">document.write(unescape("%3Cscript")+" src='http://widget.zenback.jp/?base_uri=http%3A//sfool.net/&nsid=96077893620251471%3A%3A96077897109875332&rand="+Math.ceil((new Date()*1)*Math.random())+"' type='text/javascript'"+unescape("%3E%3C/script%3E"));</script><!-- X:E ZenBackWidget -->
<!-- end #zenback_area -->
</div>
<?php endif; ?>

<!-- end .post_body -->
</div>

<?php comments_template(); ?>

<!-- end .post -->
</article>

<div class="post_nav_area">
<ul class="post_nav">
<?php if (get_previous_post()) : ?>
<li class="post_prev">
<dl>
<dt><span class="post_prev_text">Previous</span></dt>
<dd>
<?php previous_post_link('%link'); ?>
</dd>
</dl>
</li>
<?php endif; ?>

<?php if (get_next_post()) : ?>
<li class="post_next">
<dl>
<dt><span class="post_next_text">Next</span></dt>
<dd>
<?php next_post_link('%link'); ?>
</dd>
</dl>
</li>
<?php endif; ?>
</ul>
<!-- end .post_nav_area -->
</div>


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
