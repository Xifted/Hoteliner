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

const addCartItem = (e) => {
    const idKamar = e.dataset.idKamar
    const namaKamar = e.dataset.namaKamar
    const hargaKamar = e.dataset.hargaKamar
    const imgUrl = e.dataset.imgUrl

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
        cart.push({ id: idKamar, qty: 1, namaKamar, hargaKamar, imgUrl });
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
        if (item.id == idKamar) {
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
    // Ngambil node 'cart' dari HTML
    const cartTable = document.querySelector('#cart');

    const cart = JSON.parse(localStorage.getItem('cart') ?? '[]');
    let totalHarga = 0;

    // Reset cart menjadi kosong
    cartTable.innerHTML = '';
    // Looping cart item untuk dijadikan isi dari 'cart'
    cart.forEach((item) => {
        totalHarga += item.qty * item.hargaKamar;
        cartTable.innerHTML += `
        <div class="d-flex justify-content-between border-top border-bottom p-3">
            <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                alt="">
            <div style="width: 55%;">
                <h5>${item.namaKamar}</h5>
                <p>Room${item.qty > 1 ? 's' : ''} : ${item.qty}</p>
                <button class="w-25 btn btn-danger nav-link text-black fw-bold"
                onclick="removeCartItem(${item.id})"><i class="bi bi-trash3-fill text-light"></i></button>
            </div>
        </div>
      `;
    });
    if (totalHarga <= 0) {
        if (!document.querySelector('#cartTotalContainer').classList.contains('d-none')) {
            document.querySelector('#cartTotalContainer').classList.add('d-none');
        }
        if (document.querySelector('#cartTotalContainer').classList.contains('d-flex')) {
            document.querySelector('#cartTotalContainer').classList.remove('d-flex');
        }
    } else {
        if (document.querySelector('#cartTotalContainer').classList.contains('d-none')) {
            document.querySelector('#cartTotalContainer').classList.remove('d-none');
        }
        if (!document.querySelector('#cartTotalContainer').classList.contains('d-flex')) {
            document.querySelector('#cartTotalContainer').classList.add('d-flex');
        }

        let IDRRupiah = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        document.querySelector('#cartTotal').innerText = "Total Harga : " + IDRRupiah.format(totalHarga);
    }
};