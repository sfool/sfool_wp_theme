//------------ デバック用 START -----------------------------------------
var isDebug = true, 
	isIeDebug = false,
	log = function () {},
	jsObjDebug = function () {};

if (isDebug) {

	/**
	 * コンソールにログを出力する
	 *
	 */
	log = (function () {
		if (window.console && console.log) {
			if (!Function.bind) {
				Function.prototype.bind = function (scope) {
					var func = this;
					return function () {
						return func.apply(scope, arguments);
					};
				};
			}
			return console.log.bind(console);
		} else {
			return function () {
				if (isIeDebug) {
					var text = Array.prototype.join.apply(arguments, [', ']);
					alert(text);
				}
			}
		}
	})();

	/**
	 * HTMLにオブジェクトを書き出すデバッグ関数
	 * 
	 * @param {String} idName デバッグを書き出すノードのID名
	 */
	jsObjDebug = function (idName) {
		var prent = document.getElementById(idName);
		return (function (obj) {
			return function (val) {
				var newNode;
				while (obj.childNodes.length > 0) { obj.removeChild(obj.firstChild); }
				for (var key in val) {
					if (val.hasOwnProperty(key)) {
						newNode = document.createElement('div');
						newNode.appendChild(document.createTextNode(key + ' : ' + val[key]));
						obj.appendChild(newNode);
					}
				}
			};
		})(prent);
	};
}
//------------ デバック用 END -----------------------------------------


var SFOOL = window.SFOOL || {};

/**
 * ページ内リンクのスムーズスクロール
 * 
 */
SFOOL.smoothScroll = {};
SFOOL.smoothScroll.module = function () {

	var conf = {
		attr: 'data-sfoolSmoothScroll',
		noScrollStr: 'noScroll',
		animeteSpeed: 15,
		animeteCount: 90,
		easing: 100
	};

	var methods = {

		/**
		 * ページ内リンクにイベントリスナを追加する
		 * 
		 */
		init: function () {
			window.addEventListener('load', function () {
				var aNodes = document.getElementsByTagName('a'),
					attr = conf.attr,
					noScroll = conf.noScrollStr;

				for (var i = 0, len = aNodes.length; i < len; i++) {
					var aNode = aNodes[i],
						href = aNode.getAttribute('href');

					if (href.indexOf('#') !== -1 && aNode.getAttribute(attr) !== noScroll) {
						var arr = href.split('#'),
							scrollToNode = document.getElementById(arr[1]);

						if (scrollToNode) {
							aNode.scrollToNode = scrollToNode;

							aNode.addEventListener('click', function (e) {
								e.preventDefault();
								e.stopPropagation();
								methods.anchorAction(e);
							}, false);
						}
					}
				}
			}, false);
		},

		/**
		 * クリック時の処理
		 *
		 * @param {Object} e イベントオブジェクト
		 */
		anchorAction: function (e) {
			var target = e.target,
				options = {
					scrollStart: window.pageYOffset || 0,
					scrollEnd: 0
				};

			while (target.tagName !== 'A') {
				target = target.parentNode;
			}

			options.scrollEnd = target.scrollToNode.offsetTop;

			methods.animete(options);
		},

		/**
		 * ページをスクロールさせる
		 *
		 * @param {Object} options scrollStart：スクロールの開始位置 scrollEnd：スクロールの終了位置
		 */
		animete: function (options) {
			var start = options.scrollStart,
				end = options.scrollEnd,
				c = 0,
				tmpCount = 0,
				divCount = conf.animeteCount,
				y = start,
				e = conf.easing,
				s = conf.animeteSpeed;

			function pageScroll() {
				if (tmpCount < divCount) {
					tmpCount += 1;
					c = tmpCount / divCount;
					y = (end - start) * (c + e / (100 * Math.PI) * Math.sin(Math.PI * c)) + start;

					scrollTo(0, y);

					setTimeout(pageScroll, s);
				}
			}

			pageScroll();
		}
	};
	
	methods.init();
}();


// jQuery
;(function($) {

	var methods = {

		/**
		 * ドキュメントの準備が出来たら実行する
		 * 
		 */
		init: function () {
			$('.search_form').sfoolPlugin('inputFocus');
			$('.blank').sfoolPlugin('blankLink');
			$('.over').sfoolPlugin('imgHover');

			$('#trurl').on('click.sfoolPlugin', function () {
				$(this).select();
			});
		},

		/**
		 * 外部リンクにアイコンをつける
		 * 
		 * @param {String} imgSrc 表示する画像ファイルを指定
		 * @param {String} imgClass アイコンにつけるクラス名
		 */
		blankLink: function (options) {
			var defaults = {
					imgSrc: 'http://sfool.net/wp/wp-content/themes/sfool/img/icon/blank.gif',
					imgClass: 'blank_ico'
				},
				opts = $.extend({}, defaults, options),
				imgTag = '<img class="' + opts.imgClass + '" src="' + opts.imgSrc + '" alt="">';

			$(this).after('&#160;' + imgTag);
		},

		/**
		 * サイト内検索の入力欄に効果を与える
		 * 
		 * @param {String} idName input:textのID名
		 */
		inputFocus: function (options) {
			var defaults = {
					defaText: 'ブログ内検索',
					textfield: 'input:text',
					focusClass: 'focus',
					blurClass: 'blur'
				},
				opts = $.extend({}, defaults, options),
				inputTextfield = $(opts.textfield, this),
				defaText = opts.defaText;

			inputTextfield
				.val(defaText)
				.addClass(opts.blurClass);
	
			inputTextfield.focus(function () {
				if(this.value === defaText) {
					$(this).val('')
						.removeClass(opts.blurClass)
						.addClass(opts.focusClass);
				}
			});
	
			inputTextfield.blur(function () {
				if(this.value === '') {
					$(this).val(defaText)
						.removeClass(opts.focusClass)
						.addClass(opts.blurClass);
				}
			});

			$(this).submit(function () {
				$(':text[value="' + defaText + '"]').each(function () {
					$(this).val('');
				});
			});
		},

		/**
		 * 画像のロールオーバー処理
		 * 
		 * @param {String} suffix 画像ファイルの末尾につける文字列
		 */
		imgHover: function (options) {
			var defaults = {
					suffix: '_over'
				},
				opts = $.extend({}, defaults, options),
				suffix = opts.suffix;

			$(this).hover(
				function () {
					$(this).attr('src', $(this).attr('src').replace(/^(.+)(\.[a-z]+)$/, '$1' + suffix + '$2'));
				},
				function () {
					$(this).attr('src', $(this).attr('src').replace(/^(.+)_over(\.[a-z]+)$/, '$1$2'));
				}
			);
		}
	};


	$.fn.sfoolPlugin = function (method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' +  method + ' does not exist on jQuery.sfoolPlugin');
		}
	};


	$(function () {
		// プラグインを実行
		$.fn.sfoolPlugin();
	});

})(jQuery);