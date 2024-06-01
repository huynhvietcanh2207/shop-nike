console.log(window.globalClasses.classFromAppVue); // Log class from App.vue

const button = document.querySelector('.btn-3d'); 
const button4d = document.querySelector('.btn-4d'); 
const sectionNike = document.querySelector('.section-font');
const shoes = document.querySelector('.shoes');
const aboutfont = document.querySelector('.about_font');
const aboutMain = document.querySelector('.about_main');
const reviewFont = document.querySelector('.review_font');
const box1 = document.querySelector('.box1');
const box2 = document.querySelector('.box2');
const servicesFont = document.querySelector('.services_font');
const servicesCards = document.querySelector('.services_cards');
const galleryy = document.querySelector('.gallery-container');
const services11 = document.querySelector('services1');
const services22 = document.querySelector('.services2');
const textClaritas = document.querySelector('.textClaritas');
const Claritas1 = document.querySelector('.Claritas1');
const Claritas2 = document.querySelector('.Claritas2');

function isIntoView(el) {
    if (el) {
        const rect = el.getBoundingClientRect();
        return rect.bottom <= window.innerHeight;
    }
}


isIntoView(button);
isIntoView(button4d);
isIntoView(sectionNike);
isIntoView(shoes);
isIntoView(aboutfont);
isIntoView(aboutMain);
isIntoView(reviewFont);
isIntoView(box1);
isIntoView(box2);
isIntoView(servicesFont);
isIntoView(servicesCards);
isIntoView(galleryy);
isIntoView(services11);
isIntoView(services22);
isIntoView(textClaritas);
isIntoView(Claritas1);
isIntoView(Claritas2);

window.addEventListener("scroll", () => {
    if (isIntoView(button)) {
        button.classList.add("active");
        console.log('Class active đã được thêm vào');
    }
    if (isIntoView(button4d)) {
        button4d.classList.add("active");
        console.log('Class active đã được thêm vào');
    }
    if (isIntoView(sectionNike)) {
        sectionNike.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(shoes)) {
        shoes.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(aboutfont)) {
        aboutfont.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(aboutMain)) {
        aboutMain.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(reviewFont)) {
        reviewFont.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(box1)) {
        box1.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(box2)) {
        box2.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(servicesFont)) {
        servicesFont.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(servicesCards)) {
        servicesCards.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(galleryy)) {
        galleryy.classList.add("active");
        console.log('Class active đã được thêm a vào');
    }
    if (isIntoView(services11)) {
        services11.classList.add("active");
        console.log('Class active đã được thêm 1 vào');
    }
    if (isIntoView(services22)) {
        services22.classList.add("active");
        console.log('Class active đã được thêm 2 vào');
    }
    if (isIntoView(textClaritas)) {
        textClaritas.classList.add("active");
        console.log('Class active đã được thêm 2 vào');
    }
    if (isIntoView(Claritas1)) {
        Claritas1.classList.add("active");
        console.log('Class active đã được thêm 2 vào');
    }
    if (isIntoView(Claritas2)) {
        Claritas2.classList.add("active");
        console.log('Class active đã được thêm 2 vào');
    }
});
