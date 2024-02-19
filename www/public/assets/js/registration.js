let registration = function () {
    const regWrp = document.querySelector('[data-form-reg]');

    if (regWrp) {
        document.querySelector('[data-btn-form-reg]').addEventListener('click', function() {
            const form = document.getElementById('registrationForm');

            // Перевірка обов'язкових полів перед відправкою форми
            const username = form.querySelector('#username');
            const email = form.querySelector('#email');
            const password = form.querySelector('#password');

            // Перевірка наявності обов'язкових полів
            if (!username || !email || !password) {
                alert('Please fill in all required fields.');
                return;
            }

            const data = {
                username: username.value.trim(),
                email: email.value.trim(),
                password: password.value.trim()
            };

            fetch('http://localhost/api/registration', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    username.value = '';
                    email.value = '';
                    password.value = '';
                    alert('User is registered');
                    return response.json();
                })
                .then(data => {
                    if (data.success === false) {
                        alert(data.message);
                    } else {
                        console.log(data);
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });

    }
}

export default registration;
