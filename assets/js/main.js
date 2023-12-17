const dcbtn = document.querySelector('#dcbtn');
const tgbtn = document.querySelector('#tgbtn');

const dcpanel = document.querySelector('#dc-panel');
const tgpanel = document.querySelector('#tg-panel');

const dcclose = document.querySelector('#dcclose');
const tgclose = document.querySelector('#tgclose');

dcbtn.addEventListener('click', () =>{
    dcpanel.classList.toggle('active');
    tgpanel.classList.remove('active');
});
tgbtn.addEventListener('click', () =>{
    tgpanel.classList.toggle('active');
    dcpanel.classList.remove('active');
});
dcclose.addEventListener('click', () =>{
    dcpanel.classList.remove('active');
});
tgclose.addEventListener('click', () =>{
    tgpanel.classList.remove('active');
});