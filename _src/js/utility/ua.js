export default class ua {
	constructor() {
		this.userAgent = window.navigator.userAgent.toLowerCase();
	}

	isTablet() {
		return (this.userAgent.indexOf('windows') != -1 && this.userAgent.indexOf('touch') != -1)
			|| this.userAgent.indexOf('ipad') != -1
			|| (this.userAgent.indexOf('macintosh') > -1 && 'ontouchend' in document)
			|| (this.userAgent.indexOf('android') != -1 && this.userAgent.indexOf('mobile') == -1)
			|| (this.userAgent.indexOf('firefox') != -1 && this.userAgent.indexOf('tablet') != -1)
			|| this.userAgent.indexOf('kindle') != -1
			|| this.userAgent.indexOf('silk') != -1
			|| this.userAgent.indexOf('playbook') != -1
	}

	isMobile() {
		return (this.userAgent.indexOf('windows') != -1 && this.userAgent.indexOf('phone') != -1)
			|| this.userAgent.indexOf('iphone') != -1
			|| this.userAgent.indexOf('ipod') != -1
			|| (this.userAgent.indexOf('android') != -1 && this.userAgent.indexOf('mobile') != -1)
			|| (this.userAgent.indexOf('firefox') != -1 && this.userAgent.indexOf('mobile') != -1)
			|| this.userAgent.indexOf('blackberry') != -1
	}

	isiOS() {
		let iOS = {},
			isiOS = false;

		iOS.isiPhone = this.userAgent.indexOf('iphone') >= 0;
		iOS.isiPod = this.userAgent.indexOf('ipod') >= 0;
		iOS.isiPad = this.userAgent.indexOf('ipad') >= 0;

		isiOS = (iOS.isiPhone || iOS.isiPod || iOS.isiPad);

		return isiOS;
	}

	 get tablet() { return this.isTablet(); }
	 get mobile() { return this.isMobile(); }
	 get iOS() { return this.isiOS(); }
}