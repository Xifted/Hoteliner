window.addEventListener('DOMContentLoaded', event => {   
    // Harga
    let IDRRupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
    document.querySelectorAll('.room-price').forEach(element => element.textContent = "Harga : " + IDRRupiah.format(element.textContent));
});