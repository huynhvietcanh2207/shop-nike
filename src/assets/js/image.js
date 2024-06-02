const galleryContainer = document.querySelector('.gallery-container');
const gallery = document.querySelector('.gallery');
const modal = document.querySelector('#exampleModal');

galleryContainer.addEventListener('mousemove', function (e) {
    const x = e.clientX * 100 / window.innerWidth;
    gallery.style.transform = `translateX(-${x}%)`;
});

modal.addEventListener('show.bs.modal', event => {
    galleryContainer.style.top = '150%';
});

modal.addEventListener('hide.bs.modal', event => {
    galleryContainer.style.top = '50%';
});