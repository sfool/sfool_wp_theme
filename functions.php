<?php

/**
 * メインカラムの幅を指定する変数。（記述推奨）
 */
if (!isset($content_width)) { $content_width = 940; }

/**
 * wp_headのカスタマイズ
 */
// remove_action('wp_head', 'wp_enqueue_scripts', 1);

remove_filter('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'locale_stylesheet');

// remove_action('wp_head', 'wp_print_styles', 8);
// remove_action('wp_head', 'wp_print_head_scripts', 9);

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);


// ウィジェットエリア
// サイドバーのウィジェット
register_sidebar(array(
	'name' => __( 'Side Widget' ),
	'id' => 'side-widget',
	'before_widget' => '<div id="%1$s" class="s_contents %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

// ブログのタイトル
function blogTitle() {
	// トップページのとき
	if (is_home()) {
		$title = bloginfo('name');
	}
	// カテゴリアーカイブのとき
	else if (is_category()) {
		$title = wp_title('') . 'の記事一覧';
	}
	// タグアーカイブのとき
	else if (is_tag()) {
		$title = wp_title('') . 'の記事一覧';
	}
	// 年別アーカイブのとき
	else if (is_year()) {
		$title = the_time('Y年') . 'の記事一覧';
	}
	// 月別アーカイブのとき
	else if (is_month()) {
		$title = the_time('Y年m月') . 'の記事一覧';
	}
	// 日別アーカイブのとき
	else if (is_day()) {
		$title = the_time('Y年m月d日') . 'の記事一覧';
	}
	// 検索結果のとき
	else if (is_search()) {
		$title = the_search_query() . 'の検索結果';
	}
	// 404 エラーページのとき
	else if (is_404()) {
		$title = 'ページが見つかりません';
	}
	// その他
	else {
		$title = wp_title('');
	}

	return $title;
}

// 受信したコメント
function tplComment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<li class="compost">
	<?php comment_text(); ?>
	<p class="cominfo">
	<?php comment_date(); ?> <?php comment_time(); ?>
	| 
	<?php comment_author_link(); ?>
	</p>
	
	<?php
}

// 受信したコメント
function myCommentList($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>

	<li <?php comment_class(); ?> id="comment_<?php comment_ID(); ?>">
	<div class="comment_body">
	<?php if ($comment -> comment_approved == '0') : ?>
		<p><em>あなたのコメントは承認待ちです。</em></p>
	<?php else : ?>

	<div class="comment_img">
	<?php echo get_avatar($comment -> comment_author_email, 65); ?>
	</div>

	<div class="comment_text">
	<p class="comment_meta"><?php comment_author_link(); ?> | <?php comment_date(); ?> <?php comment_time(); ?> <?php edit_comment_link('(編集)'); ?></p>

	<?php comment_text(); ?>
	</div>

	<?php endif; ?>


	<!-- end .comment_body -->
	</div>

	
	<?php
}


//「続きを読む」のカスタマイズ
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');

	if ($offset) {
		$end = strpos($link, '"',$offset);
	}

	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}

	return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');

// タグクラウドのカスタマイズ
add_filter('widget_tag_cloud_args', create_function('$args', 'return array_merge($args, array(\'smallest\' => 10, \'largest\' => 16, \'unit\' => \'px\' ));') );



/**
 * ホームやアーカイブ毎に表示条件を変える
 *
 * @param Object $query
 */
function changePostsPerPage($query) {
	// 管理画面、またはメインクエリーでない場合は処理を中止
	if (is_admin() || !$query->is_main_query()) { return; }

	if ($query->is_post_type_archive('news')) {
		// お知らせの表示件数
		$query->set('posts_per_page', '1');
	}
}

// add_action('pre_get_posts', 'changePostsPerPage');


/* 記事本文内で使用するショートコード
   ========================================================================== */

/**
 * テンプレートディレクトリのURIを取得する
 */
function getTemplateDirectoryUri() {
	return get_template_directory_uri();
}

/**
 * ホームのURLを取得する
 */
function getHomeUrl() {
	return home_url('/');
}

/**
 * 「WordPressのアドレス(URL)」を取得する
 */
function getSiteUrl() {
	return site_url('/');
}

add_shortcode('templateDirectoryUri', 'getTemplateDirectoryUri');
add_shortcode('homeUrl', 'getHomeUrl');
add_shortcode('siteUrl', 'getSiteUrl');
