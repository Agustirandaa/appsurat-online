<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman | {{ $title }} </title>
    <link rel="icon" href="/img/logouin.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/datatables.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    
    {{-- Nabvar --}}
    @include('dashboard.layouts.navbar')
    
    {{-- Sidebar --}}
    @include('dashboard.layouts.sidebar')
    
    
    
    <section id="main">
        @yield('content')
    </section>
    
    
    @extends('dashboard.layouts.modal')
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/echarts_5.4.3_echarts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="/js/datatables.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/selectSurat.js"></script>
    
    
    <!-- Slug untuk Surat MASUK -->
    <script>
        const nomorSurat = document.querySelector('#nomor_surat');
        const pengirim = document.querySelector('#pengirim');
        const slug = document.querySelector('#slug');
        
        function updateSlugSuratMasuk() {
            const nomorSuratValue = nomorSurat.value;
            const pengirimValue = pengirim.value;
            if (nomorSuratValue && pengirimValue) {
                const combinedValue = nomorSuratValue + '.' + pengirimValue;
                fetch('/transaksi/suratmasuk/checkSlug?nomor_surat=' + combinedValue)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
                .catch(error => console.error('Error:', error));
            }
        }  
        nomorSurat.addEventListener('change', updateSlugSuratMasuk);
        pengirim.addEventListener('change', updateSlugSuratMasuk);
    </script>
    
    
    
    <!-- Slug untuk Surat KELUAR -->
    <script>
        const nomorSuratElements = document.querySelectorAll('#nomor_surat');
        const namaElements = document.querySelectorAll('#nama');
        const slugElements = document.querySelectorAll('#slug');
        
        // Fungsi untuk mengupdate slug
        function updateSlugSuratKeluar(nomorSuratElement, namaElement, slugElement) {
            const nomorSuratValue = nomorSuratElement.value;
            const namaValue = namaElement.value;
            if (nomorSuratValue && namaValue) {
                const combinedValue = nomorSuratValue + '.' + namaValue;
                fetch('/transaksi/suratkeluar/checkSlug?nomor_surat=' + combinedValue)
                .then(response => response.json())
                .then(data => slugElement.value = data.slug)
                .catch(error => console.error('Error:', error));
            }
        }
        
        // Menambahkan event listener untuk setiap grup atribut
        for (let i = 0; i < nomorSuratElements.length; i++) {
            nomorSuratElements[i].addEventListener('change', function() {
                updateSlugSuratKeluar(nomorSuratElements[i], namaElements[i], slugElements[i]);
            });
            
            namaElements[i].addEventListener('change', function() {
                updateSlugSuratKeluar(nomorSuratElements[i], namaElements[i], slugElements[i]);
            });
        }
        
    </script>
    
    @yield('script')
</body>

</html>