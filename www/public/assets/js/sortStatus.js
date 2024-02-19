let sortStatus = function () {
    const btnSort = document.querySelector('[data-btn-sort]');

    if(btnSort) {
        btnSort.addEventListener('click', () => {
            const apiUrl = 'http://localhost/api/to-do-list/sort';

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({}),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        });
    }
}

export default sortStatus;