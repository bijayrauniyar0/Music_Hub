var uploader = document.querySelector('.upload-formm')

document.addEventListener("DOMContentLoaded", function() {
    // Toggle the class 'open' of the uploader
    document.querySelector('.upload-formm').classList.toggle('open');
});

function closeUploader(){
    uploader.classList.remove('open')

}

// tabbind in the aside

function openTabs(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).classList.add("active");
    evt.currentTarget.classList.add("active");
}

