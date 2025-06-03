function clearErrors(formId = 'formId') {
    const form = document.getElementById(formId);
    if (!form) return;

    const errorElements = form.querySelectorAll('.is-valid-message');
    errorElements.forEach(el => {
        el.textContent = '';
    });
}

function setErrors(errors = {}, formId = 'formId') {
    const form = document.getElementById(formId);
    if (!form) return;

    Object.entries(errors).forEach(([field, messages]) => {
        const errorElement = form.querySelector(`#error-${field}`);
        if (errorElement) {
            errorElement.textContent = messages[0];
            errorElement.classList.add('is-valid-message');
        }
    });

    document.querySelector('.is-valid-message')
        ?.closest('div')
        ?.querySelector('input, select, textarea')
        ?.focus()
}
