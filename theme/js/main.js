import 'css/main.scss';
import 'babel-polyfill';
import 'whatwg-fetch';

import smoothScroll from 'smooth-scroll';

import imageLoader from 'image-loader';
import menuTrigger from 'menu-trigger';
import contactForm from 'contact-form';

document.addEventListener('DOMContentLoaded', () => {
    smoothScroll.init();

    imageLoader();
    menuTrigger();

    const $contactForm = document.querySelector('.js-contact-form');
    if ($contactForm) {
        contactForm($contactForm);
    }
});
