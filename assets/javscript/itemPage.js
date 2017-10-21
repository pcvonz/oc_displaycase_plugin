// NodeList foreach
// from the mdn: https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach
if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = function (callback, thisArg) {
    thisArg = thisArg || window
    for (var i = 0; i < this.length; i++) {
      callback.call(thisArg, this[i], i, this)
    }
  }
}


let lightBoxContent = document.querySelectorAll('.lightbox > *')
let lightBoxContainer = document.querySelector('.lightbox-container')

window.onload = function () {
  lightBoxContainer.setAttribute('style', 'height: ' + document.querySelector('.lightbox').offsetHeight + 'px')
}
window.addEventListener('resize', function () {
  lightBoxContainer.setAttribute('style', 'height: ' + document.querySelector('.lightbox').offsetHeight + 'px')
});
lightBoxContent.forEach((el) => {
  el.addEventListener('click', () => {
    enlargeSelf(el)
  })
})

function enlargeSelf (el) {
  console.log(el.style.display !== 'block')
  if (el.style.display !== 'block') {
    lightBoxContent.forEach((lb) => {
      lb.style = 'display: none'
    })
    el.style = `
    width: auto;
    max-width: 80vw;
    display: block`
    el.querySelector('svg').innerHTML = '<use xlink:href="#icon-circle-x"></use>'
    el.parentNode.style = `
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: 100vw;
        justify-content: center;
    `
    el.parentNode.className = `lightbox background-primary-transparent`
  } else {
    lightBoxContent.forEach((lb) => {
      lb.style.display = ''
    })
    el.style = ``
    el.querySelector('svg').innerHTML = '<use xlink:href="#icon-magnifying-glass"></use>'
    el.parentNode.style = ``
    el.parentNode.className = 'lightbox'
  }
}

