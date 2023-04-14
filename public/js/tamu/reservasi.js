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

document.addEventListener("DOMContentLoaded", () => {
    getCartItems();
});

const diskon = document.querySelector("#diskon");

diskon.addEventListener('change', function (e) {
    const diskonId = e.target.value;
    // const diskonName = this.textContent;
    const idRsv = e.target.querySelector(`option[value="${e.target.value}"]`).dataset.idRsv;
    // const diskonValue = e.target.querySelector(`option[value="${e.target.value}"]`).dataset.diskonValue;
    // console.log(diskonValue);
    let diskon = JSON.parse(localStorage.getItem('diskon') || '[]');
    const totalHarga = diskon.reduce((total, item) => total + parseInt(item.hargaKamar), 0);
    // console.log(totalHarga)
    const diskonIndex = diskon.findIndex(item => item.type === 'coupon');

    if (diskonIndex >= 0) {
        // Jika sudah ada, update data kupon dengan data yang sudah ada
        diskon[diskonIndex] = {
            type: 'coupon',
            idRsv: idRsv,
            id_diskon: diskonId
        };
    } else {
        // Jika belum ada, tambahkan data kupon ke dalam local storage diskon
        diskon.push({
            type: 'coupon',
            idRsv: idRsv,
            id_diskon: diskonId
        });
    }
    if (diskonId == null || diskonId == '') {
        diskon.splice(diskonIndex);
    }
    localStorage.setItem('diskon', JSON.stringify(diskon));
});

let checkIn = document.querySelector("#checkIn");
let checkOut = document.querySelector("#checkOut");
let catatan = document.querySelector("#catatan");

const getDetailData = (idKamar) => {
    checkIn.dataset.idItem = idKamar;
    checkOut.dataset.idItem = idKamar;
    catatan.dataset.idItem = idKamar;

    // console.log(checkIn.dataset.idRsv);

    const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");
    // console.log(cart);
    
    const id = checkIn.dataset.idItem;
    const item = cart.find((cartItem) => cartItem.id == id);
    checkIn.value = item.checkIn;
    checkOut.value = item.checkOut;
    catatan.value = item.catatan;

    checkIn.addEventListener("change", (event) => {
        // console.log(checkIn.value);
        const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

        const id = checkIn.dataset.idItem;
        const item = cart.find((cartItem) => cartItem.id == id);
        const updatedData = {
            ...item,
            checkIn: event.target.value,
            idRsv: checkIn.dataset.idRsv,
        };

        // Menyimpan data yang diperbarui ke dalam localStorage berdasarkan id
        const updatedCart = cart.map((cartItem) =>
            cartItem.id == id ? updatedData : cartItem
        );
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    });

    checkOut.addEventListener("change", (event) => {
        const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

        const id = event.target.dataset.idItem;
        const item = cart.find((cartItem) => cartItem.id == id);
        const updatedData = { ...item, checkOut: event.target.value };

        // Menyimpan data yang diperbarui ke dalam localStorage berdasarkan id
        const updatedCart = cart.map((cartItem) =>
            cartItem.id == id ? updatedData : cartItem
        );
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    });

    catatan.addEventListener("change", (event) => {
        const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

        const id = event.target.dataset.idItem;
        const item = cart.find((cartItem) => cartItem.id == id);
        const updatedData = { ...item, catatan: event.target.value };

        // Menyimpan data yang diperbarui ke dalam localStorage berdasarkan id
        const updatedCart = cart.map((cartItem) =>
            cartItem.id == id ? updatedData : cartItem
        );
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    });
};

const getCartItems = () => {
    // Ngambil node 'cart' dari HTML
    const cartTable = document.querySelector("#cart");
    let checkForm = document.querySelector("#checkForm");

    const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

    let totalHarga = 0;

    // Reset cart menjadi kosong
    cartTable.innerHTML = "";

    // Looping cart item untuk dijadikan isi dari 'cart'
    cart.forEach((item) => {
        totalHarga += item.qty * item.hargaKamar;
        cartTable.innerHTML += `
        <button onclick="getDetailData(${
            item.id
        })" id="dataBtn" type="button" class="btn d-flex justify-content-between border-top border-bottom p-3 border-0 bg-white mb-1">
            <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                alt="">
            <div style="width: 55%;">
                <h5 class:"text-start">${item.namaKamar}</h5>
                <p class:"text-start">Room${item.qty > 1 ? "s" : ""} : ${
            item.qty
        }</p>
            </div>
        </button>
      `;
    });
    // cart.forEach((item) => {
    //     checkForm.innerHTML += `
    //         <h4>Tanggal Check-In</h4>
    //         <input onchange="getDetailData()" id="checkIn"  class="form-control text-dark w-50 ms-4" name="tgl_in" type="date" placeholder="Tanggal Check-In *" required />
    //         <h4>Tanggal Check-Out</h4>
    //         <input onchange="getDetailData()" id="checkOut" class="form-control text-dark w-50 ms-4" name="tgl_in" type="date" placeholder="Tanggal Check-In *" required />
    //         <h4>Catatan : </h4>
    //         <div class="form-floating ms-4">
    //             <textarea onchange="getDetailData()" id="catatan" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
    //             <label for="floatingTextarea2">Catatan</label>
    //         </div>
    //     `
    // })
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

const submitBtn = document.getElementById("submitBtn");

submitBtn.addEventListener("click", (event) => {
    event.preventDefault();
    const diskon = localStorage.getItem('diskon') ?? [];
    const cart = localStorage.getItem("cart") ?? [];
    const csrf = document.querySelector("input[name='_token']").value;
    const idRsv = JSON.parse(localStorage.getItem('cart'))[0].idRsv;

    $.ajax({
        method: "POST",
        url: "/rooms/detailreservasi/action/",
        headers: { "X-CSRF-TOKEN": csrf },
        data: { details: cart, diskon: diskon},
        success: function (response) {
            window.location = "/rooms/transaksi/" + idRsv;
            localStorage.removeItem("cart");
        },
        error: function (xhr, textStatus, error) {
            console.error(error);
        },
    });
});
