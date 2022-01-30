export const isTouchDevice = (() => {
	var result = false;
	if (window.ontouchstart === null) {　result = true; }
	return result;
})();