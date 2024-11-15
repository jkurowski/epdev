const toggleSubmitBtn = () => {
    const termsCheckboxes = [
        document.getElementById('terms-1'),
        document.getElementById('terms-2'),
        document.getElementById('terms-3'),
        document.getElementById('terms-4'),
    ];
    const submitButton = document.querySelector('.btn-submit');

    if (
        submitButton &&
        termsCheckboxes.every((checkbox) => checkbox !== null)
    ) {
        const areAllChecked = () =>
            termsCheckboxes.every((checkbox) => checkbox.checked);

        termsCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                submitButton.disabled = !areAllChecked();
            });
        });

        submitButton.disabled = !areAllChecked();
    } else {
        console.warn(
            'Nie znaleziono jednego z termsCheckboxes lub submitButton.',
        );
    }
};

const clearMessages = () => {
    const formErrors = document.getElementById('form-errors');
    const formSuccess = document.getElementById('form-success');

    formErrors.innerHTML = '';
    formSuccess.innerHTML = '';
};

const displayErrors = (errors) => {
    const formError = document.getElementById('form-errors');

    for (let key in errors) {
        const errorMessage = document.createElement('div');
        errorMessage.textContent = errors[key];
        formError.appendChild(errorMessage);
    }
};

const sendForm = async () => {
    try {
        clearMessages();

        const formData = {
            username: document.getElementById('user-name').value,
            email: document.getElementById('user-email').value,
            tel: document.getElementById('user-tel').value,
            company: document.getElementById('user-company').value,
            message: document.getElementById('user-message').value,
        };

        const response = await fetch('/contact-form.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();

        if (data.success) {
            document.getElementById('form-success').textContent = data.message;
        } else {
            const formError = document.getElementById('form-errors');

            if (data.errors) {
                displayErrors(data.errors);
            } else {
                formError.textContent = data.message;
            }
        }
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
        alert('Wystąpił błąd podczas przetwarzania żądania.');
    }
};

document
    .getElementById('contact-form')
    .addEventListener('submit', async (event) => {
        event.preventDefault();
        await sendForm();
    });

toggleSubmitBtn();
