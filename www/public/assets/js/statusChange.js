let statusChange = function () {
    const btnArr = document.querySelectorAll('[data-id-status]');
    const idArr = document.querySelectorAll('[data-id]');

    btnArr.forEach((el, index) => {
        el.addEventListener('click', () => {
            const apiUrl = 'http://localhost/api/to-do-list/status';
            const idStatus = (idArr[index].getAttribute('data-id'));

            let status = el.innerText ;

            // if(el.innerText === status) {
            //     status = 'виконано';
            // } else {
            //     status = 'не виконано';
            // }

            console.log(status);

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: idStatus, status: status }),
            };
            fetch(apiUrl, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Ошибка с кодом ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Элемент успешно изменен:', data);
                    // location.reload();
                })
                .catch(error => {
                    console.error('Произошла ошибка:', error.message);
                })
        });
    });
}

export default statusChange;