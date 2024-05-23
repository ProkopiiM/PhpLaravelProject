


document.addEventListener("DOMContentLoaded", function() {
    const phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function(event) {
        const input = event.target.value.replace(/\D/g, '').substring(0, 11);
        const phoneFormat = '+7 (' + input.substring(1, 4) + ') ' + input.substring(4, 7) + '-' + input.substring(7, 9) + '-' + input.substring(9, 11);
        event.target.value = phoneFormat;
    });

    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        this.submit();
    });
});

/*
function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const message = document.getElementById('message').value.trim();
    const agree = document.getElementById('agree').checked;

    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const phoneError = document.getElementById('phoneError');
    const agreeError = document.getElementById('agreeError');

    nameError.textContent = '';
    emailError.textContent = '';
    phoneError.textContent = '';
    agreeError.textContent = '';

    let isValid = true;

    // Валидация имени
    if (name === '') {
        nameError.textContent = 'Поле "Имя" обязательно для заполнения.';
        isValid = false;
    } else if (!/^[а-яА-Яa-zA-Z\s]{2,16}$/.test(name)) {
        nameError.textContent = 'Имя должно содержать только буквы и быть длиной от 2 до 16 символов.';
        isValid = false;
    }

    // Валидация email
    if (email !== '' && !/^\S+@\S+\.\S{2,}$/.test(email)) {
        emailError.textContent = 'Введите корректный адрес электронной почты.';
        isValid = false;
    }

    // Валидация телефона
    if (!/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/.test(phone)) {
        phoneError.textContent = 'Введите телефон в формате +7 (###) ###-##-##.';
        isValid = false;
    }

    // Валидация согласия
    if (!agree) {
        agreeError.textContent = 'Необходимо принять согласие с политикой обработки персональных данных.';
        isValid = false;
    }

    // Если форма валидна, можно отправить данные
    if (isValid) {
        alert('Форма отправлена!');
        return isValid;
    }
}
*/
