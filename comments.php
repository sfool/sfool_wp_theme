<div class="p-post_comments">
<?php if (have_comments()): ?>
<h3>コメント</h3>

<ul class="p-post_commets_list">
<?php
// コメント一覧の表示
$args = array(
	'type' => 'comment', // コメントのタイプを comment のみに指定
	'callback' => 'myCommentList' // my_comment_list関数は、functions.php に記述
);

wp_list_comments($args);
?>
</ul>

<?php // コメントページャーの表示
	if ( $wp_query -> max_num_comment_pages > 1 ) :
?>
<div class="p-post_comment_page_link">
<?php
	$args = array(
		'prev_text' => '&laquo; Prev',
		'next_text' => 'Next &raquo;',
	);
	paginate_comments_links($args);
?>
</div>
<?php endif; ?>


<?php
// ここまで if(have_comments())
endif;
?>

<?php
// ここからコメントフォームを表示
if (comments_open()) :
	$comments_args = array(
		'fields' => array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url' => '',
		),
		'title_reply' => 'コメントはお気軽にどうぞ',
		'comment_notes_before' => '<p class="comment-notes">メールアドレスは公開されませんのでご安心ください。</p>',
		'label_submit' => '送信',
	);
	comment_form($comments_args);
else:
?>
<p>現在コメントは受け付けておりません。</p>
<?php endif; ?>

<!-- end .p-post_comments -->
</div>