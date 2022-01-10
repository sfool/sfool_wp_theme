<div id="comments">
<?php if (have_comments()): ?>
	<h3>コメント</h3>

	<ul class="commets_list">
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
	<div class="comment_page_link">
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
	// ここからピンバックを表示
	$str = '<h3>トラックバック</h3>';
	$str .= '<ul class="trackback_list">';

	$i = 0;
	foreach ($comments as $comment) {
		if ( get_comment_type() != 'comment' ) {
			$str .= '<li class="clearfix"' . 'id="comment_' . get_comment_ID() . '">';
			$str .= '<div class="trackback_author">';
			$str .= '<cite>' . get_comment_author_link() . '</cite>';
			$str .= '<p class="comment_meta">' . '<a href="' . esc_url(get_comment_link( $comment -> comment_ID)) . '">' . get_comment_date() .'<span>'. get_comment_time() . '</span><a class="edit" href="' . get_edit_comment_link() . '">（編集）</a></span></p>';
			$str .='</div>';
			$str .= '<div class="trackback_body">';
			if ($comment -> comment_approved == '0') {
				$str .= '<p class="attention"><em>' . 'あなたのトラックバックは承認待ちです。' . '</em></p>';
			}
			$str .= '<p>'. get_comment_text() .'</p>';
			$str .='</div>';
			$str .= '</li>';
			$i++;
		}
	}

	$str .= '</ul>';
	if ($i > 0 ) { echo $str; } // ピンバックを表示 ここまで
?>

<?php
// ここまで if(have_comments())
endif;
?>

<?php
// ここからコメントフォームを表示
if (comments_open()) :
	comment_form();
else:
?>
	<p>現在コメントは受け付けておりません。</p>
<?php endif; ?>


<?php // ここからトラックバックURLを表示 ?>
<?php if (pings_open()) : ?>
	<h3>トラックバックURL</h3>
	<p><input id="trurl" readonly="readonly" value="<?php trackback_url(true); ?>" type="text"></p>
<?php else: ?>
	<p>現在トラックバックは受け付けておりません。</p>
<?php endif; ?>

<!-- end #comments -->
</div>