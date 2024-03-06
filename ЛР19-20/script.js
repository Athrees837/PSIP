const items = [
    {
        name: 'Манга Атака титанов',
        image: 'Attack_on_titans.jpg',
        price: 13
    },
    {
        name: 'Манга Jujutsu kaisen',
        image: 'Jujutsu_Kaisen.jpg',
        price: 15
    },
    {
        name: 'Манга Токийский гуль',
        image: 'Tokyo_Ghoul.jpg',
        price: 10
    },
    {
        name: 'Манга Убийца Демонов',
        image: 'Demon_Slayer.webp',
        price: 14
    },
    {
        name: 'Манга One piece',
        image: 'One_piece.jpg',
        price: 20
    },
    {
        name: 'Манга Бродячие псы',
        image: 'Bungo_Stray_Dogs.webp',
        price: 10
    }
];

const container = document.querySelector('.container');

items.forEach(item => {
    const row = document.createElement('div');
    row.classList.add('row');

    const card = document.createElement('div');
    card.classList.add('card');

    const image = document.createElement('img');
    image.src = item.image;

    const text = document.createElement('div');
    text.textContent = item.name;

    const price = document.createElement('div');
    price.classList.add('price');
    price.textContent = item.price + '$'

    const button = document.createElement('button');
    button.textContent = 'В корзину';
    button.addEventListener('click', function() {
        addToCart(item);
    });

    card.appendChild(image);
    card.appendChild(text);
    card.appendChild(price);
    card.appendChild(button);

    row.appendChild(card);
    container.appendChild(row);
});

function toggleCartButton() {
    const cart = document.querySelector('.cart-container');
    if (cart.style.display === 'none' || cart.style.display === '') {
        cart.style.display = 'flex';
    } else {
        cart.style.display = 'none';
    }
}

let cart = JSON.parse(localStorage.getItem('cart')) || [];
let totalPrice = 0;

function getPrice() {
    cart.forEach(item => {
        totalPrice += item.price;
    })
}

function addToCart(item) {
    cart.push(item);
    saveCartToLocalStorage();
    updateCart();
}

function updateCart() {
    const cartItemsElement = document.querySelector('.cart-items');
    const price = document.querySelector('.priceItem');
    cartItemsElement.innerHTML = '';
    let totalPrice = 0;

    cart.forEach(item => {
        totalPrice += item.price
        saveCartToLocalStorage();

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        const image = document.createElement('img');
        image.src = item.image;

        const info = document.createElement('div');
        info.textContent = item.name + ' - ' + item.price + '$'

        const thisItem = document.createElement('div');
        thisItem.classList.add('item');

        cartItemsElement.appendChild(cartItem);
        thisItem.appendChild(image);
        thisItem.appendChild(info);
        cartItem.appendChild(thisItem);

        const button = document.createElement('button');
        button.textContent = "Удалить";
        button.addEventListener('click', function() {
            deleteFromCart(item);
        })
        cartItem.appendChild(button);
    });

    price.textContent = 'Итого: ' + totalPrice +  '$';
}

function saveCartToLocalStorage() {
    const cartJSON = JSON.stringify(cart);
    localStorage.setItem('cart', cartJSON);
}

function loadCartFromLocalStorage() {
    const cartFromStorage = localStorage.getItem('cart');
    if (cartFromStorage) {
        cart = JSON.parse(cartFromStorage);
        updateCart();
    }
}

function deleteFromCart(item) {
    const index = cart.indexOf(item);
    if (index !== -1) {
        cart.splice(index, 1);
        saveCartToLocalStorage();
        updateCart();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    loadCartFromLocalStorage();
});