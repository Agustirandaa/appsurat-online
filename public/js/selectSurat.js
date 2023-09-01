// SELECT SURAT
$(document).ready(function () {
    $('#select-surat').change(function (e) { 
        var selectedValue = $(this).val()
        // Select surat
        $('.selected-surat').filter('[id="' + selectedValue + '"]').show();
        $('.selected-surat').not('[id="' + selectedValue + '"]').hide();
    });



    // Jika status Mahasiswa munculkan perihal surat dengan status Mahasiswa
    // Jika status Dosen munculkan perihal surat dengan status Dosen

    $('[aria-label]').each(function() {
        var suratForm = $(this);
        var selectedStatus = suratForm.find('#js_status');
        var mahasiswaSelect = suratForm.find('.js_select_mahasiswa');
        var dosenSelect = suratForm.find('.js_select_dosen');
    
        selectedStatus.change(function() {
            var selectedValue = $(this).val(); 
            if (selectedValue == 'Mahasiswa') {
                mahasiswaSelect.show();
                dosenSelect.hide();
            } else if (selectedValue == 'Dosen') {
                mahasiswaSelect.hide();
                dosenSelect.show();
            }
        });

      var perihalSurat = suratForm.find('.perihal_surat');
      var formulir = suratForm.find('#formulir');

        perihalSurat.change(function () { 
            console.log(suratForm);
            formulir.show();
            handleFormChangesSuratKeterangan(suratForm);
        });
    });
    
    function handleFormChangesSuratKeterangan(suratForm) {
        var selectValue = suratForm.find('.perihal_surat').val();
        var category_surat = '';
        var body_surat = '';

        switch (selectValue) {
    
// Case Bagian Surat Keterangan
    // Bagian Mahasiswa
            case 'Permohonan surat keterangan telah mengikuti KKP':
                body_surat = "Adalah benar telah mengikuti Kuliah Kerja Praktek Tahun Ajaran 2021/2022 pada Kantor Kejaksaaan Negeri Aceh Barat Daya selama 60 (Enam Puluh) hari Kerja.";
                showInputMahasiswa(suratForm);
                hideInputDosen(suratForm);
            break;

            case 'Permohonan surat keterangan telah mengikuti KPM':
                body_surat = "Adalah benar telah mengikuti Kuliah Pengabdian Masyarakat Tahun 2021 di Bener Meriah dan dinyatakan lulus dengan nilai 88.20 (A-)";
                showInputMahasiswa(suratForm);
                hideInputDosen(suratForm);
            break;

            case 'Permohonan surat keterangan telah mengikuti Mahad':           
                body_surat = "Adalah benar telah mengikuti Program Ma'had Al-Jami'ah dan Asrama Universitas Islam Negeri Ar-Raniry Banda Aceh Angkatan VII Gelombang 4 Tahun Akademik 2020/2021 dengan Status Kelulusan: Baik.";
                showInputMahasiswa(suratForm);
                hideInputDosen(suratForm);
            break;

    // Bagian dosen
            case 'Permohonan surat keterangan telah submit Artikel':               
                body_surat = "Telah melakukan submit artikel pada jurnal program studi Teknologi Informasi UIN Ar-Raniry Banda Aceh pada edisi volume 7, No 1, 20 january 2023";
                showInputDosen(suratForm);
                hideInputMahasiswa(suratForm);
            break;
// END Case Bagian Surat Keterangan



// Case Bagian Surat Permohonan
    // Bagian Dosen
            case 'Permohonan SK Pembina HMP Prodi Teknologi Informasi':      
                body_surat = "Sehubungan dengan adanya pergantian Kepengurusan HIMA TI pada Prodi Teknologi Indfromasi, maka dengan ini kami memohon kepada Bapak agar sudi kiranya menerbitkan SK Pembina HMP Program Studi Teknologi Informasi, Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh. Pembina HMP Prodi Teknologi Informasi atas nama:";
                showInputDosen(suratForm);
                hideInputMahasiswa(suratForm);
            break;

            case 'Permohonan SK Koordinator KKP Prodi Teknologi Informasi': 
                body_surat = "Sehubungan dengan adanya kegiatan Kuliah Kerja Praktik pada Prodi Teknologi Infromasi, maka dengan ini kami memohon kepada Bapak agar sudi kiranya menerbitkan SK Koordinator Kuliah Kerja Praktik Semester Genap 2022/2023 Program Studi Teknologi Informasi, Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh. Pembina HMP Prodi Teknologi Informasi atas nama:"
                showInputDosen(suratForm);
                hideInputMahasiswa(suratForm);
            break;

    // END Case Bagian Surat Permohonan

            default:
                body_surat = 'Select Value js tidak ada';
            break;
        }
         suratForm.find('.js_body_surat').val(body_surat);
    }

    // Show inputan mahasiswa
    function showInputMahasiswa(suratForm){
        suratForm.find('.js_nim').show();
    }
    
    // Hide column input mahasiswa, misal yang dipilih inputan dosen
    function hideInputMahasiswa(suratForm) { 
        suratForm.find('.js_nim').hide().find('input').removeAttr('required');
    }
    
    // Show inputan dosen
    function showInputDosen(suratForm){
        suratForm.find('.js_nip').show();
        suratForm.find('.js_pangkat_gol').show();
        suratForm.find('.js_jabatan').show();
        suratForm.find('.js_judul_artikel').show();
    }
  
    // Hide column input dosen, misal yang dipilih inputan mahasiswa
    function hideInputDosen(suratForm) { 
        suratForm.find('.js_nip').hide().find('input').removeAttr('required');
        suratForm.find('.js_pangkat_gol').hide().find('input').removeAttr('required');
        suratForm.find('.js_jabatan').hide().find('input').removeAttr('required');
        suratForm.find('.js_judul_artikel').hide().find('input').removeAttr('required');   
    }
      
});

