<article class="post">
<div class="post_body">
<p class="date"><span><?php echo get_the_date(); ?>　Category：<?php the_category(', ') ?></span></p>

<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<?php the_content('続きを読む &raquo;'); ?>
<!-- end  .post_body -->
</div>

<!-- end .post -->
</article>