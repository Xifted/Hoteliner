window.addEventListener('DOMContentLoaded', event => {
    const price = document.getElementById('harga');
    let IDRRupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
    price.textContent = IDRRupiah.format(price.textContent);
    
});