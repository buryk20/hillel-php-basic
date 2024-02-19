let formToDoList = function () {
    let btnForm = document.querySelector('[data-btn-form]');
    if(!btnForm) {
        btnForm.addEventListener('click', submitForm);
    }
    function submitForm() {
        var xhr = new XMLHttpRequest();

        // Укажите URL вашего PHP-скрипта
        xhr.open("POST", "http://localhost/api/to-do-list", true);

        // Установите заголовок для отправки данных в формате JSON
        xhr.setRequestHeader("Content-type", "application/json");

        // Получите значения полей формы
        let title = document.getElementById("title").value;
        let priority = document.getElementById("priority").value;
        // Преобразуйте данные в формат JSON и отправьте запрос
        xhr.send(JSON.stringify({ title: title, priority: priority }));

        // Определите, что делать при получении ответа от сервера
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    alert("Ответ от сервера: " + xhr.responseText);
                    location.reload();
                } else {
                    alert("Произошла ошибка на сервере");
                }
            }
        };
    }
}

export default formToDoList;
