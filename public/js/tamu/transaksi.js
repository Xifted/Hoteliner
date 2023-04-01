window.addEventListener("DOMContentLoaded", (event) => {
    // Harga
    let IDRRupiah = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });
    document
        .querySelectorAll("#harga")
        .forEach(
            (element) =>
            (element.textContent =
                "Harga : " + IDRRupiah.format(element.textContent))
        );
});
