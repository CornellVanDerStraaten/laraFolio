let form = document.querySelector('.login__form');

if (document.getElementById('submitTriangle')) {
    let submitButton = document.getElementById('submitTriangle');
    submitButton.addEventListener('click', () => {
        form.submit();
    })
}

