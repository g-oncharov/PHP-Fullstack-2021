function dropDownHandler () {
    document.querySelector('.drop-down-list').classList.toggle('active');
}
document.querySelector('.drop-down-button').addEventListener('click', dropDownHandler);