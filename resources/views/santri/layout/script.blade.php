</body>
<!-- plugin for charts  -->
<script src="./assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

<script>
    const tanggalInput = document.getElementById('tanggal_transfer');
    const hariIni = new Date();
    const tahun = hariIni.getFullYear();
    const bulan = String(hariIni.getMonth() + 1).padStart(2, '0');
    const tanggal = String(hariIni.getDate()).padStart(2, '0');
    const formatTanggal = `${tahun}-${bulan}-${tanggal}`;
    tanggalInput.setAttribute('max', formatTanggal);


    // Dapatkan elemen info text
    const infoTanggalElement = document.getElementById('info-tanggal');

    // Buat format tanggal yang lebih mudah dibaca (e.g., "5 Juli 2025")
    const namaBulan = hariIni.toLocaleString('id-ID', {
        month: 'long'
    }); // Menggunakan lokal Indonesia
    const teksTanggalLengkap = `${tanggal} ${namaBulan} ${tahun}`;

    // Perbarui teks di dalam elemen <p>
    infoTanggalElement.innerHTML = `Info: Hari ini adalah tanggal <span class="font-semibold">${teksTanggalLengkap}</span>.`;
</script>

</html>