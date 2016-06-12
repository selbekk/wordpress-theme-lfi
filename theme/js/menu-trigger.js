export default function menuTrigger() {
    const $trigger = document.querySelector('.js-menu-trigger');
    const $menu = document.querySelector('.js-menu');

    $trigger.addEventListener('click', () => {
        $menu.classList.toggle('is-open');
        $trigger.classList.toggle('is-open');
    });
}
