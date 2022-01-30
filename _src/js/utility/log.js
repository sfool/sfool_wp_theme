export let log = (function () {
	if (window.console && console.log) {
		if (!Function.bind) {
			Function.prototype.bind = function (scope) {
				let func = this;
				return function () {
					return func.apply(scope, arguments);
				};
			};
		}
		return console.log.bind(console);
	} else {
		return function () {
			let text = Array.prototype.join.apply(arguments, [', ']);
			alert(text);
		};
	}
})();