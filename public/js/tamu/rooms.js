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
const cartFunction = (idKamar) => {
    if (localStorage.getItem("cart") == null) {
        localStorage.setItem("cart", JSON.stringify([]));
    }

    const cart = JSON.parse(localStorage.getItem("cart"));

    let ada = false;
    cart.forEach((cartItem, i) => {
        if (cartItem.idKamar === idKamar) {
            cart[i].qty += cart[i].qty;
            ada = true;
        }
    });

    if (!ada) {
        cart.push({
            idKamar,
            qty: 1,
        });
        localStorage.setItem("cart", JSON.stringify(cart))
    }
};
