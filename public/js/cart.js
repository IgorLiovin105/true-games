const addToCart = document.getElementById('add-to-cart')
const token = document.head.querySelector('[name="token"][content]').content
const id = document.getElementById('add-to-cart-button').dataset.id
let cartQuantity = document.getElementById('cart-quantity')
let productQuantity = document.getElementById('product-quantity')

addToCart.addEventListener('submit', function(e) {
    e.preventDefault()
    fetch('/add-to-cart', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': token,
        },
        body: JSON.stringify({id}),
    }).then(res => res.json()).then(res => {
        if(res.status == 405) {
            alert(res.message)
            return console.log(res)
        }
        productQuantity.innerHTML = res.productQuantity,
        cartQuantity.innerHTML = res.cartQuantity,
        alert(res.message)
        return console.log(res)
    })
})
