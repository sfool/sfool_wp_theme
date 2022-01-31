// utility
import {log} from 'utility/log';
import {isTouchDevice} from 'utility/isTouchDevice';
import ua from 'utility/ua';

// project
import pageLoading from 'project/pageLoading';
import smoothScroll from 'project/smoothScroll';


// log('main.js');

// スムーズスクロール
smoothScroll();

// ローディング
pageLoading();

