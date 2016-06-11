export default function loadImages() {
    const loadables = Array.from(document.querySelectorAll('[data-src]'));

    loadables.forEach(loadable => {
        loadable.classList.add('image-loader');
        loadable.classList.add('is-loading');
        const image = new Image();
        image.addEventListener('load', () => {
            if (loadable.tagName === 'IMG') {
                loadable.src = image.src;
            } else {
                loadable.style.backgroundImage = `url(${image.src})`;
            }
            loadable.classList.remove('is-loading');
        });

        image.src = loadable.getAttribute('data-src');
    });
}
