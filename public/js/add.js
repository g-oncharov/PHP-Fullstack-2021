function loadFile(e) {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        document.querySelector('.add-section__input-item--preview').classList.add('d-block');
        reader.addEventListener('load', function (e) {
            document.querySelector('.preview-block__image img').src = e.target.result;
        });
        reader.readAsDataURL(this.files[0]);
    }
}
document.querySelector(".input--file").addEventListener('change', loadFile);
