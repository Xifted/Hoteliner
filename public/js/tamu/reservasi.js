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
