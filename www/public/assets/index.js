let wrpMainPage = document.querySelector('[data-wrp-main-page]');
if(wrpMainPage) {
    document.addEventListener('DOMContentLoaded', function () {
        let ball = document.querySelector('[data-ball]');

        document.addEventListener('mousemove', function (event){
            let mouseX = event.clientX;
            let mouseY = event.clientY;

            ball.style.left = (mouseX - ball.offsetWidth / 2) + 'px';
            ball.style.top = (mouseY - ball.offsetHeight /2) + 'px';
        })
    })
}