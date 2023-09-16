<div class="p-post__nav_area">
<ul class="ul p-post__nav">
<li class="p-post__prev">
<span class="p-post__prev_text"><?php if (is_single()) { previous_post_link('%link', '前の記事を見る'); } else { next_posts_link('前の記事を見る'); } ?></span>
</li>
<li class="p-post__next">
<span class="p-post__next_text"><?php if (is_single()) { next_post_link('%link', '次の記事を見る'); } else { previous_posts_link('次の記事を見る'); } ?></span>
</li>
</ul>
<!-- end .p-post__nav_area -->
</div>