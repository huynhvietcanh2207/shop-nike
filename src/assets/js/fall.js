// const btnAdd = document.querySelector('.btn-add')
const snowCanvas = document.querySelector('.snow-canvas')
for (let index = 0; index < 30; index++) {
   
    
    // tạo thẻ div
    const snow = document.createElement('div')
    snow.className = 'snow'
    snow.textContent = '｡o○'
    // hoặc classList.add('snow')
    snow.style.left = getRandomIntInclusive(0,95) + "%";
    snow.style.filter = `blur(${getRandomIntInclusive(0,3)}px)`
    snow.style.opacity = `${getRandomIntInclusive(.5,1)}`;
    snow.style.animationDuration = `${getRandomIntInclusive(4,10)}s,${getRandomIntInclusive(1,5)}s`;
    // thêm snow(con) vào cuối snowcanvas(cha)
    // hoac appendChild
    snowCanvas.append(snow);
}




function getRandomIntInclusive(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled); // The maximum is inclusive and the minimum is inclusive
}
