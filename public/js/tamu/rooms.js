window.addEventListener('DOMContentLoaded', event => {
    // Harga
    let IDRRupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
    const price = document.querySelectorAll('.room-price').forEach(element => element.textContent = IDRRupiah.format(element.textContent));
    price.textContent = IDRRupiah.format(price.textContent);
});