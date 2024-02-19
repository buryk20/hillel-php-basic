import formToDoList from './js/formToDoList.js';
formToDoList();

import delIItemList from './js/delIItemList.js';
delIItemList();

import statusChange from './js/statusChange.js';
statusChange();

import sortStatus from './js/sortStatus.js';
sortStatus();

import registration from './js/registration.js';
registration();

import search from "./js/search.js";
search();

document.getElementById('dataForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('http://localhost/requests', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('result').innerHTML = 'Результат: ' + data.result;
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});