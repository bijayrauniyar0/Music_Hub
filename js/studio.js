var uploader = document.querySelector('.upload-formm')
var data_container = document.querySelector('.uploaded-data-container')

function openUploader(){
    uploader.classList.toggle('open');
    data_container.classList.toggle('open');
    document.querySelector('.main').classList.add('blur');
    document.querySelector('.footer').style.display = 'none'
}

function closeUploader(){
    uploader.classList.remove('open')
    data_container.classList.remove('open')
    document.querySelector('.main').classList.remove('blur');
    document.querySelector('.footer').style.display = 'block'

}
