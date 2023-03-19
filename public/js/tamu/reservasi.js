window.addEventListener("DOMContentLoaded", (event) => {
    const price = document.getElementById("harga");
    let IDRRupiah = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });
    price.textContent = IDRRupiah.format(price.textContent);

    document.querySelectorAll(".fasilitas_check").forEach((element) =>
        element.addEventListener("change", function (e) {
            const facilityElement = document.querySelector(
                `#${e.target.dataset.idElement}`
            );
            if (element.checked) {
                facilityElement.hidden = false;
            } else {
                facilityElement.hidden = true;
            }
        })
    );
});

document.addEventListener('DOMContentLoaded', () => {
    getCartItems();
});

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
        <button type="button" class="btn d-flex justify-content-between border-top border-bottom p-3 border-0 bg-white">
            <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                alt="">
            <div style="width: 55%;">
                <h5>${item.namaKamar}</h5>
                <p>Room${item.qty > 1 ? 's' : ''} : ${item.qty}</p>
            </div>
        </button>
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