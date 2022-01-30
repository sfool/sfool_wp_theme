import {log} from 'utility/log';

export default function smoothScroll() {

	// スクロールさせたくないリンクは「data-smooth-scroll="no_scroll"」を設定する
	let conf = {
		attr: 'data-smooth-scroll',
		noScrollStr: 'no_scroll',
		animateSpeed: 15,
		animateCount: 90,
		easing: 100
	};

	let methods = {

		/**
		 * ページ内リンクにイベントリスナを追加する
		 * 
		 */
		init: () => {
			window.addEventListener('load', () => {
				let aNodes = document.getElementsByTagName('a'),
					attr = conf.attr,
					noScroll = conf.noScrollStr;

				for (let i = 0, len = aNodes.length; i < len; i++) {
					let aNode = aNodes[i],
						href = aNode.getAttribute('href');

					if (href && href.indexOf('#') !== -1 && aNode.getAttribute(attr) !== noScroll) {
						let arr = href.split('#'),
							scrollToNode = document.getElementById(arr[1]);

						if (scrollToNode) {
							aNode.scrollToNode = scrollToNode;

							aNode.addEventListener('click', (event) => {
								event.preventDefault();
								event.stopPropagation();
								methods.anchorAction(event);
							}, false);
						}
					}
				}
			}, false);
		},

		/**
		 * クリック時の処理
		 *
		 * @param {Object} event イベントオブジェクト
		 */
		anchorAction: (event) => {
			let target = event.currentTarget,
				options = {
					scrollStart: window.pageYOffset || 0,
					scrollEnd: 0
				};

			options.scrollEnd = target.scrollToNode.offsetTop;

			methods.animate(options);
		},

		/**
		 * ページをスクロールさせる
		 *
		 * @param {Object} options scrollStart：スクロールの開始位置 scrollEnd：スクロールの終了位置
		 */
		animate: (options) => {
			let start = options.scrollStart,
				end = options.scrollEnd,
				c = 0,
				tmpCount = 0,
				divCount = conf.animateCount,
				y = start,
				e = conf.easing,
				s = conf.animateSpeed,
				pageScroll = () => {
					if (tmpCount < divCount) {
						tmpCount += 1;
						c = tmpCount / divCount;
						y = (end - start) * (c + e / (100 * Math.PI) * Math.sin(Math.PI * c)) + start;

						scrollTo(0, y);

						setTimeout(pageScroll, s);
					}
				};

			pageScroll();
		}
	};
	
	methods.init();
}