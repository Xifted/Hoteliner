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