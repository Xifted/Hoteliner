const pendapatan = document.getElementById("pendapatan").textContent;

const formattedNominal = parseInt(pendapatan).toLocaleString("id-ID", {
    style: "currency",
    currency: "IDR",
  });
document.getElementById("pendapatan").textContent = formattedNominal;