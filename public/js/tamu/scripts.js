/*!
* Start Bootstrap - Agency v7.0.11 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 
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

const clearLocalStorage = () => {
    localStorage.removeItem("cart");
}

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        // responsiveNavItem.addEventListener('click', () => {
        //     if (window.getComputedStyle(navbarToggler).display !== 'none') {
        //         navbarToggler.click();
        //     }
        // });
    });

    // Harga
    let IDRRupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
});
window.addEventListener("DOMContentLoaded", (event) => {
    // Harga
    let IDRRupiah = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    });
    document
        .querySelectorAll(".room-price1")
        .forEach(
            (element) =>
            (element.textContent =
                "Harga : " + IDRRupiah.format(element.textContent))
        );
    // document.querySelector("#harga").textContent = "Harga : " + IDRRupiah.format;
});
