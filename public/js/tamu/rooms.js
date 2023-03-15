window.addEventListener("DOMContentLoaded", (event) => {
    // Harga
    let IDRRupiah = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });
    document
        .querySelectorAll(".room-price")
        .forEach(
            (element) =>
            (element.textContent =
                "Harga : " + IDRRupiah.format(element.textContent))
        );
});

document.addEventListener('DOMContentLoaded', () => {
    getCartItems();
});

const addCartItem = (idKamar) => {
    if (localStorage.getItem('cart') == null) {
        localStorage.setItem('cart', JSON.stringify([]));
    }
    let cart = JSON.parse(localStorage.getItem('cart') ?? '[]');

    // Ngecek apakah kamar sudah pernah ditambahkan ke keranjang
    if (cart.find((item) => item.id === idKamar)) {
        // Kalau sudah pernah maka diloop untuk mencari id kamarnya, lalu kuantitasnya ditamabah
        cart.forEach((item, i) => {
            if (item.id === idKamar) {
                item.qty += 1;
                cart[i] = item;
                return;
            }
        });
    } else {
        // Kalau tidak ketemu maka akan ditambah id baru ke dalam keranjang, dengan qty 1
        cart.push({ id: idKamar, qty: 1 });
    }

    // Save keranjang ke dalam localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    getCartItems();
};

const removeCartItem = (idKamar) => {
    if (localStorage.getItem('cart') == null) {
        return;
    }
    let cart = JSON.parse(localStorage.getItem('cart') ?? '[]');

    let newCart = [];
    cart.forEach((item) => {
        // Ngecek apakah kamar ada di keranjang
        if (item.id === idKamar) {
            // Kalau ada maka qty dikurangi 1
            item.qty -= 1;
            if (item.qty <= 0) {
                return;
            }
        }
        newCart.push(item);
    });

    // Save keranjang ke dalam localStorage
    localStorage.setItem('cart', JSON.stringify(newCart));
    getCartItems();
};

const getCartItems = () => {
    // Ngambil node 'tbody' dari HTML
    const cartTable = document.querySelector('#cart');

    const cart = JSON.parse(localStorage.getItem('cart') ?? '[]');

    // Reset tbody menjadi kosong
    cartTable.innerHTML = '';
    // Looping cart item untuk dijadikan isi dari 'tbody'
    cart.forEach((item) => {
        cartTable.innerHTML += `
      <div>
        <h5>Standard Room</h5>
        <p>Id : ${item.id}</p>
        <p>Rooms : ${item.qty}</p>
        <p>Harga : </p>
        <td><button onclick="removeCartItem(${item.id})">Hapus</button></td>
      </div>
      `;
    });
};
