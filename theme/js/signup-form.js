export class SignupForm {
    constructor($el) {
        this.$form = $el;
        this.$formFields = this.$form.querySelector('.js-form-fields');
        this.$feedback = this.$form.querySelector('.js-form-feedback');
        this.$button = this.$form.querySelector('.js-submit');

        this.send = this.send.bind(this);
        this.mailFailed = this.mailFailed.bind(this);
        this.showFeedback = this.showFeedback.bind(this);

        this.$form.addEventListener('submit', this.send);
        this.$button.addEventListener('click', this.send);
    }

    send(e) {
        e.preventDefault();

        fetch(this.$form.action, {
            method: this.$form.method,
            body: new FormData(this.$form),
        })
        .then(response => {
            this.showFeedback();
            if (response.status === 200) {
                this.mailSent();
            } else {
                this.mailFailed();
            }
        })
        .catch(this.mailFailed);
    }

    mailSent() {
        this.$feedback.innerHTML = `
            <h2>Så hyggelig å ha deg i familien!</h2>
            <p>
                Du er nå innmeldt i treningssenteret vårt. Nå er det bare å ta
                turen innom treningssenteret, så ordner vi resten. Regningen får
                du i posten.
            </p>`;
    }

    mailFailed() {
        const email = this.$feedback.dataset.email;
        this.$feedback.innerHTML = `
            <h2>Ups, dette gikk ikke.</h2>
            <p>
                Send oss istedenfor en mail på <a href="mailto:${email}">
                ${email}</a>, så får vi deg innmeldt allikevel :)
            </p>`;
    }

    showFeedback() {
        this.$formFields.classList.add('is-hidden');
        this.$feedback.classList.add('is-visible');
    }
}

export default function initContactForm($el) {
    if ($el) {
        return new SignupForm($el);
    }
    return false;
}
