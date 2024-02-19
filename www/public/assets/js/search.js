let search = function () {
    const wrpSearch = document.querySelector('[data-wrp-search]');

    if(wrpSearch) {
        const emailSearch = wrpSearch.querySelector('#emailSearch');
        const btn = wrpSearch.querySelector('[data-btn-form-search]');

        btn.addEventListener('click', function (){
            const email = emailSearch.value.trim();

            if (!email) {
                alert('Please enter an email.');
                return;
            }

            const data = {
                email: email
            };

            fetch('http://localhost/api/registration/search', {
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
                    return response.json();
                })
                .then(data => {
                    if (data.success === false) {
                        alert(data.message);
                    } else {
                        // Оновіть або відобразіть дані на сторінці HTML
                        const userData = data.data;
                        // Наприклад, ви можете відобразити дані у певний елемент HTML з id="userDataContainer"
                        const userDataContainer = document.getElementById('userDataContainer');
                        userDataContainer.innerHTML = `Username: ${userData.name}, Email: ${userData.email}`; // Припустимо, що відповідні дані містяться у userData
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        })
    }
}

export default search;