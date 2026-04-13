fetch("../backend/fetch_gallery.php")
.then(res => res.text())
.then(data => {
    document.getElementById("galleryData").innerHTML = data;
});
function openLightbox(src) {
    document.getElementById("lightbox").style.display = "flex";
    document.getElementById("lightbox-img").src = src;
}

function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
}