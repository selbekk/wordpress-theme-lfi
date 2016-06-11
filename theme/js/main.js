import 'css/main.scss';
import 'babel-polyfill';

import imageLoader from 'image-loader';
import smoothScroll from 'smooth-scroll';

document.addEventListener('DOMContentLoaded', () => {
    imageLoader();
    smoothScroll.init();
});
