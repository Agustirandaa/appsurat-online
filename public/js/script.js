$(document).ready(function () {

    // Jquery for toggle sub menu
    $('.sub-btn-item').click(function() {
        var $currentSubMenu = $(this).next('.sub-menu');
        var $currentIcon = $(this).find('.icon-dropdown');
      
        if ($currentSubMenu.is(':visible')) {
          // Jika slide toggle saat ini sedang aktif, tutup submenu saat ini dan reset ikon
          $currentSubMenu.slideUp();
          $currentIcon.removeClass('rotate');
        } else {
          // Jika slide toggle saat ini tidak aktif, aktifkan slide toggle saat ini, nonaktifkan yang lainnya, dan putar ikon
          $('.sub-menu').not($currentSubMenu).slideUp();
          $('.icon-dropdown').not($currentIcon).removeClass('rotate');
          $currentSubMenu.slideDown();
          $currentIcon.addClass('rotate');
        }
      });
      
// Jquery for collapse sidebar
    $('.menu-btn').click(function(){
        $('.side-bar').toggleClass('active')
        $('#main').toggleClass('active')
        $('.navbar').toggleClass('active')
    });


// Sifat Surat
    $('.sifat-surat').each(function() {
        var sifat = $(this).html();
        if (sifat === "Penting") {
          $(this).css('color', 'green');
        } else if (sifat === "Rahasia") {
          $(this).css('color', 'red');
        } else if (sifat === "Biasa"){
          $(this).css('color', 'blue');
        } else {
          $(this).css('color', 'black');
        }
      });



// Delete Modal Surat Masuk
    $('.deletedModalSuratMasuk').click(function(e){ 
      // Tampilkan modal
      $('#deletedModalSuratMasuk').modal('show');

      var dataSlug = $(this).attr('data-slug');
      var nomorSurat = $(this).attr('data-nomor');

      $('#show-nomor-surat-masuk').text(nomorSurat);
      // Ubah action yang ada pada modal deleted
      $('#deletedFormModalSuratMasuk').attr('action', dataSlug);

      e.preventDefault();
    });


// Delete Modal Surat Keluar
      $('.deletedModalSuratKeluar').click(function(e){ 
        // Tampilkan modal
        $('#deletedModalSuratKeluar').modal('show');

        var dataSlug = $(this).attr('data-slug');
        var nomorSurat = $(this).attr('data-nomor');

        console.log(dataSlug);
        console.log(nomorSurat);

        $('#show-nomor-surat-keluar').text(nomorSurat);
        // Ubah action yang ada pada modal deleted
        $('#deletedFormModalSuratKeluar').attr('action', dataSlug);

        e.preventDefault();
      });

// Delete Modal User
      $('.deletedModalUser').click(function(e){ 
        // Tampilkan modal
        $('#deletedModalUser').modal('show');

        var dataSlug = $(this).attr('data-id');
        var nomorSurat = $(this).attr('data-name');

        console.log(dataSlug);
        console.log(nomorSurat);

        $('#show-name-user').text(nomorSurat);
        // Ubah action yang ada pada modal deleted
        $('#deletedFormModalUser').attr('action', dataSlug);

        e.preventDefault();
      });




// Datatables
    const dataTable = $('#dataTable').DataTable({
      "lengthMenu": [10, 25, 50, 100],
      "pageLength": 14
    });

// Fungsi untuk mengubah jumlah entri dalam tabel saat nilai dropdown berubah
    $('#showEntries').on('change', function() {
      const selectedValue = $(this).val();
      dataTable.page.len(selectedValue).draw();
    });


// Search datatables
    // Fungsi untuk menangani pencarian eksternal
     function externalSearch() {
      const searchValue = $('#searchInput').val();
      dataTable.search(searchValue).draw();
    }
    // Panggil fungsi externalSearch() saat nilai input pencarian berubah
    $('#searchInput').on('input', externalSearch);
});











// Chart Pie

var myChartPie = echarts.init(document.getElementById('myChartPie'));
var suratMasuk = parseInt(document.getElementById('myChartPie').getAttribute('data-surat-masuk'));
var suratKeluar = parseInt(document.getElementById('myChartPie').getAttribute('data-surat-keluar'));
var optionChartPie = {
  tooltip: {
    trigger: 'item'
  },
  legend: {
    bottom: '0%',
    left: 'center'
  },
  series: [
    {
      name: 'Access From',
      type: 'pie',
      radius: ['55%', '70%'],
      avoidLabelOverlap: false,
      label: {
        show: false,
        position: 'center'
      },
      emphasis: {
        label: {
          show: true,
          fontSize: 18,
          fontWeight: 'bold'
        }
      },
      labelLine: {
        show: false
      },
      data: [
        { value: suratMasuk, name: 'Surat Masuk', itemStyle: { color: '#155EFF' } },
        { value: suratKeluar, name: 'Surat Keluar', itemStyle: { color: '#76a2fa' } },
      ]
    }
  ]
};
myChartPie.setOption(optionChartPie);











// Chart Bar
var myChartBar = echarts.init(document.getElementById('myChartBar'));
var optionChartBar = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['Surat Masuk', 'Surat Keluar'], // Data legend
        top: '0%', // Letak legend
        left: 'center'
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '8%', // Berikan ruang untuk legend
        containLabel: true
    },
    xAxis: [
        {
            type: 'category',
            data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: 'Surat Masuk',
            type: 'bar',
            stack: 'Ad',
            emphasis: {
                focus: 'series'
            },
            data: [],
            itemStyle: {
                color: '#155EFF',
            },
            barMaxWidth: 40
        },
        {
            name: 'Surat Keluar',
            type: 'bar',
            stack: 'Ad',
            emphasis: {
                focus: 'series'
            },
            data: [],
            itemStyle: {
                color: '#76a2fa',
            },
            barMaxWidth: 40
        }
    ]
};
myChartBar.setOption(optionChartBar);

var currentYear = new Date().getFullYear(); // Mendapatkan tahun saat ini
var dataMasuk = [];
var dataKeluar = [];

for (var bulan = 1; bulan <= 12; bulan++) {
    (function (bulanIndex) {
        $.ajax({
            url: '/get-data-by-month-and-year/' + bulanIndex + '/' + currentYear, // Menambahkan parameter tahun
            method: 'GET',
            success: function (response) {
                var index = bulanIndex - 1;

                dataMasuk[index] = response.data_masuk;
                dataKeluar[index] = response.data_keluar;

                if (dataMasuk.length === 12 && dataKeluar.length === 12) {
                    optionChartBar.series[0].data = dataMasuk;
                    optionChartBar.series[1].data = dataKeluar;
                    myChartBar.setOption(optionChartBar);
                }
            }
        });
    })(bulan);
}








