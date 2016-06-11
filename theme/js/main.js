import 'css/main.scss';
import 'babel-polyfill';

import smoothScroll from 'smooth-scroll';

import imageLoader from 'image-loader';

document.addEventListener('DOMContentLoaded', () => {
    smoothScroll.init();

    imageLoader();
});
