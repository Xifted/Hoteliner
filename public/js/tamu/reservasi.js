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
    // getDetailData();
});

// const saveDetailValue = () => {
//     const id_tipe = document.querySelector("#form-pengubahan").dataset.id;
//     let checkIn = document.querySelector("#checkIn").value;
//     let checkOut = document.querySelector("#checkOut").value;
//     let catatan = document.querySelector("#catatan").value;

//     let cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

//     editedItem = cart.find(function (item) {
//         if (item.id == id_tipe) {
//             return item.id;
//         } else {
//             return -1;
//         }
//     });

//     if (editedItem == -1) {
//         return;
//     }

//     cart[editedItem].checkIn = checkIn;
//     cart[editedItem].checkOut = checkOut;
//     cart[editedItem].catatan = catatan;

//     // if (cart.find((item) => item.id)) {
//     //     cart.forEach((item) => {
//     //         item.checkIn = checkIn;
//     //         item.checkOut = checkOut;
//     //         item.catatan = catatan;
//     //         return;
//     //     });
//     // }

//     localStorage.setItem("cart", JSON.stringify(cart));
// };

let checkIn = document.querySelector("#checkIn");
let checkOut = document.querySelector("#checkOut");
let catatan = document.querySelector("#catatan");

const getDetailData = (idTipe) => {
    // const idTipe =  e.dataset.idTipe;

    // const detailCart = document.querySelector("#form-pengubahan")

    // let dataBtn = document.querySelector('#dataBtn');
    // const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

    // detailCart.innerHTML = '';

    checkIn.dataset.idItem = idTipe;
    checkOut.dataset.idItem = idTipe;
    catatan.dataset.idItem = idTipe;

    // if (item.id === idTipe) {
    //     checkIn.value = item.checkIn;
    //     checkOut.value = item.checkOut;
    //     catatan.value = item.catatan;
    // }
};

checkIn.addEventListener("change", (event) => {
    const cart = JSON.parse(localStorage.getItem("cart") ?? "[]");

    const id = checkIn.dataset.idItem;
    const item = cart.find((cartItem) => cartItem.id == id);
    const updatedData = { ...item, checkIn: event.target.value };

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
        <button data-id-tipe="" onclick="getDetailData(${
            item.id
        })" id="dataBtn" type="button" class="btn d-flex justify-content-between border-top border-bottom p-3 border-0 bg-white">
            <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                alt="">
            <div style="width: 55%;">
                <h5>${item.namaKamar}</h5>
                <p>Room${item.qty > 1 ? "s" : ""} : ${item.qty}</p>
            </div>
        </button>
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
