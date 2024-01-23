let delIItemList = function () {
    const btnArr = document.querySelectorAll('[data-btn-del]');
    const idArr = document.querySelectorAll('[data-id]');

    btnArr.forEach((el, index) => {
        el.addEventListener('click', () => {
            const apiUrl = 'http://localhost/api/to-do-list/del';
            const idToDelete = (idArr[index].getAttribute('data-id'));
            console.log(idToDelete);

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: idToDelete }),
            };
            fetch(apiUrl, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Ошибка с кодом ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Элемент успешно удален:', data);
                    location.reload();
                })
                .catch(error => {
                    console.error('Произошла ошибка:', error.message);
                })
        });
    });
}

export default delIItemList;