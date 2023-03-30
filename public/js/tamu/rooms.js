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

function dropDown() {
    document.getElementById("dropDownItems").classList.toggle("tampil");
}

window.onclick = function (event) {
    if (!event.target.matches('#profileBtn')) {
        var dropdowns = document.getElementById("dropDownItems");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('tampil')) {
                openDropdown.classList.remove('tampil');
            }
        }
    }
}

const clearLocalStorage = () => {
    localStorage.removeItem("cart");
}

document.addEventListener("DOMContentLoaded", () => {
    const statusLogin = document.getElementById('statusLogin').dataset.loginStatus;
    // console.log(statusLogin);
    if (statusLogin == 'logged out'){
        localStorage.removeItem("cart");
    }else{
        getCartItems();
    }
});

const addCartItem = (e) => {
    const idTipe = e.dataset.idTipe;
    const namaKamar = e.dataset.namaKamar;
    const hargaKamar = e.dataset.hargaKamar;
    const imgUrl = e.dataset.imgUrl;
    const maxQty = e.dataset.maxQty;
    const checkIn = '';
    const checkOut = '';
    const catatan = '';
    

    if (localStorage.getItem("cart") == null) {
        localStorage.setItem("cart", JSON.stringify([]));
    }
    let cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

    // Ngecek apakah kamar sudah pernah ditambahkan ke keranjang
    if (cart.find((item) => item.id === idTipe)) {
        // Kalau sudah pernah maka diloop untuk mencari id kamarnya, lalu kuantitasnya ditamabah
        cart.forEach((item, i) => {
            if (item.id === idTipe) {
                if (item.qty == maxQty) {
                    alert("Stok "+ namaKamar + " Saat Ini Hanya Tersedia " + maxQty + " Kamar")
                } else {
                    item.qty += 1;
                    cart[i] = item;
                    return;
                }
            }
        });
    } else {
        // Kalau tidak ketemu maka akan ditambah id baru ke dalam keranjang, dengan qty 1
        cart.push({ id: idTipe, qty: 1, namaKamar, hargaKamar, imgUrl, checkIn, checkOut, catatan });
    }

    // Save keranjang ke dalam localStorage
    localStorage.setItem("cart", JSON.stringify(cart));
    getCartItems();
};

const removeCartItem = (idTipe) => {
    if (localStorage.getItem("cart") == null) {
        return;
    }
    let cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

    let newCart = [];
    cart.forEach((item) => {
        // Ngecek apakah kamar ada di keranjang
        if (item.id == idTipe) {
            // Kalau ada maka qty dikurangi 1
            item.qty -= 1;
            if (item.qty <= 0) {
                return;
            }
        }
        newCart.push(item);
    });

    // Save keranjang ke dalam localStorage
    localStorage.setItem("cart", JSON.stringify(newCart));
    getCartItems();
};

const getCartItems = () => {
    // Ngambil node 'cart' dari HTML
    const cartTable = document.querySelector("#cart");

    const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");
    let totalHarga = 0;

    // Reset cart menjadi kosong
    cartTable.innerHTML = "";
    // Looping cart item untuk dijadikan isi dari 'cart'
    cart.forEach((item) => {
        totalHarga += item.qty * item.hargaKamar;
        cartTable.innerHTML += `
        <div class="d-flex justify-content-between border-top border-bottom p-3">
            <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                alt="">
            <div style="width: 55%;">
                <h5>${item.namaKamar}</h5>
                <p>Room${item.qty > 1 ? "s" : ""} : ${item.qty}</p>
                <button class="w-25 btn btn-danger nav-link text-black fw-bold"
                onclick="removeCartItem(${
                    item.id
                })"><i class="bi bi-trash3-fill text-light"></i></button>
            </div>
        </div>
      `;
    });
    if (totalHarga <= 0) {
        if (
            !document
                .querySelector("#cartTotalContainer")
                .classList.contains("d-none")
        ) {
            document
                .querySelector("#cartTotalContainer")
                .classList.add("d-none");
        }
        if (
            document
                .querySelector("#cartTotalContainer")
                .classList.contains("d-flex")
        ) {
            document
                .querySelector("#cartTotalContainer")
                .classList.remove("d-flex");
        }
    } else {
        if (
            document
                .querySelector("#cartTotalContainer")
                .classList.contains("d-none")
        ) {
            document
                .querySelector("#cartTotalContainer")
                .classList.remove("d-none");
        }
        if (
            !document
                .querySelector("#cartTotalContainer")
                .classList.contains("d-flex")
        ) {
            document
                .querySelector("#cartTotalContainer")
                .classList.add("d-flex");
        }

        let IDRRupiah = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        });
        document.querySelector("#cartTotal").innerText =
            "Total Harga : " + IDRRupiah.format(totalHarga);
    }
};
