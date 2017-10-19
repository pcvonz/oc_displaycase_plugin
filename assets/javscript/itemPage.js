let lightBoxContent = document.querySelectorAll('.lightbox > *')

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
    width: 80%;
    display: block`
    el.querySelector('svg').innerHTML = '<use xlink:href="#icon-circle-x"></use>'
    el.parentNode.style = `
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
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

