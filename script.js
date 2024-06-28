document.addEventListener('DOMContentLoaded', function () {
    const readMoreButtons = document.querySelectorAll('.read-more-btn');

    readMoreButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const cardBody = this.closest('.card-body');
            const shortText = cardBody.querySelector('.short-text');
            const longText = cardBody.querySelector('.long-text');

            if (shortText.classList.contains('d-none')) {
                shortText.classList.remove('d-none');
                longText.classList.add('d-none');
                this.textContent = 'Read More';
            } else {
                shortText.classList.add('d-none');
                longText.classList.remove('d-none');
                this.textContent = 'Read Less';
            }
        });
    });
});
