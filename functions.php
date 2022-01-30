<?php

/* wp_headのカスタマイズ
--------------------------------------------------------- */

// サイト全体のフィードを非表示
remove_action('wp_head', 'feed_links', 2);

// コメントのフィードなどの非表示
remove_action('wp_head', 'feed_links_extra', 3);

// ブログ投稿ツールの非表示
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// linkタグの非表示
remove_action('wp_head', 'index_rel_link');

// WordPressのバージョンを非表示
remove_action('wp_head', 'wp_generator');

// rel=”canonical”タグの非表示
remove_action('wp_head', 'rel_canonical');

// rel=”prev”とrel=”next”の非表示
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// 短縮URLの非表示
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

// 絵文字の非表示
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('emoji_svg_url', '__return_false');


// 「Embed」を使用しない
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');

// remove_action('wp_head', 'wp_enqueue_scripts', 1);
// remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// remove_action('wp_head', 'start_post_rel_link', 10, 0);
// remove_action('wp_head', 'adjacent_posts_rel_link');
// remove_action('wp_head', 'locale_stylesheet');
// remove_action('wp_head', 'wp_print_styles', 8);
// remove_action('wp_head', 'wp_print_head_scripts', 9);


/* フロントページ表示時の管理者バー
--------------------------------------------------------- */
function disable_admin_bar(){
    return false;
}
add_filter('show_admin_bar', 'disable_admin_bar');


/* 「WordPressへようこそ！」を非表示
--------------------------------------------------------- */
remove_action('welcome_panel', 'wp_welcome_panel');



/* メディアのサイズ
--------------------------------------------------------- */

// 「大サイズ」の最大幅
if (!isset($content_width)) { $content_width = 1540; }


/* コメント
--------------------------------------------------------- */
function myCommentList($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>

	<li <?php comment_class(); ?> id="p-post_comment_<?php comment_ID(); ?>">
	<div class="p-post_comment_body">
	<?php if ($comment -> comment_approved == '0') : ?>
		<p><em>あなたのコメントは承認待ちです。</em></p>
	<?php else : ?>

	<div class="p-post_comment_img">
	<?php echo get_avatar($comment -> comment_author_email, 65); ?>
	</div>

	<div class="p-post_comment_text">
	<p class="p-post_comment_meta"><?php comment_author_link(); ?> | <?php comment_date(); ?> <?php comment_time(); ?> <?php edit_comment_link('(編集)'); ?></p>

	<?php comment_text(); ?>
	</div>

	<?php endif; ?>


	<!-- end .comment_body -->
	</div>

	
	<?php
}


/* 記事本文内で使用するショートコード
--------------------------------------------------------- */

// テンプレートディレクトリのURIを取得する
function getTemplateDirectoryUri() {
	return get_template_directory_uri();
}

// ホームのURLを取得する
function getHomeUrl() {
	return home_url('/');
}

// 「WordPressのアドレス(URL)」を取得する
function getSiteUrl() {
	return site_url('/');
}

add_shortcode('templateDirectoryUri', 'getTemplateDirectoryUri');
add_shortcode('homeUrl', 'getHomeUrl');
add_shortcode('siteUrl', 'getSiteUrl');
