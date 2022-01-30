import {log} from 'utility/log';

export default function pageLoading(callback = () => {}) {
	let isLoading = false,
		maxWaitTime = 5000,
		loading = () => {
			let $loading = $('#p-page_loading');
			// スクロールバーを表示
			$('html, body').removeClass('u-overflow_hidden');

			// アニメーション
			$loading.addClass('complete');

			$loading.on('webkitTransitionEnd transitionend', () => {
				// log('-- $loading transitionend --');

				$loading.remove();
				isLoading = true;

				callback();
			});
		};

	// ページロードの最大待ち時間
	setTimeout(() => {
		// log('setTimeout');
		// log('isLoading: ' + isLoading);
		if (!isLoading) { loading(); }
	}, maxWaitTime);

	// ローディング
	$(window).on('load', () => {
		if (!isLoading) { loading(); }
	});
}