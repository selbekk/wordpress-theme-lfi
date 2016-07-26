export class ContactForm {
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
        .then(this.showFeedback)
        .then(response => {
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
            <h2>Melding mottatt!</h2>
            <p>
                Takk for at du tok kontakt. Vi svarer deg så fort vi har
                mulighet, typisk innen en arbeidsdag.
            </p>`;
    }

    mailFailed() {
        const email = this.$feedback.dataset.email;
        this.$feedback.innerHTML = `
            <h2>Ups, dette gikk ikke.</h2>
            <p>
                Send oss istedenfor en mail på <a href="mailto:${email}">
                ${email}</a>, så tar vi kontakt så fort vi kan.
            </p>`;
    }

    showFeedback() {
        this.$formFields.classList.add('is-hidden');
        this.$feedback.classList.add('is-visible');
    }
}

export default function initContactForm($el) {
    if ($el) {
        return new ContactForm($el);
    }
    return false;
}
