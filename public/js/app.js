let menuIcon = document.getElementById('menu-icon')
let menu = document.getElementById('menu')

menuIcon.addEventListener('click', function(e) {
    e.preventDefault()
    menu.classList.toggle('_active')
})