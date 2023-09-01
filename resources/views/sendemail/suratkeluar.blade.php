<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    
    <h2>{{ $dataMail['tujuan_surat'] }}</h2>
    <table>
        <tr>
            <td><b>Jenis surat</b></td>
            <td>:</td>
            <td>{{ $dataMail['jenis_surat'] }}</td>
        </tr>
        <tr>
            <td><b>Perihal</b></td>
            <td>:</td>
            <td>{{ $dataMail['perihal_surat'] }}</td>
        </tr>
        <tr>
            <td><b>Sifat</b></td>
            <td>:</td>
            <td>{{ $dataMail['sifat_surat'] }}</td>
        </tr>
    </table>
    <br>
    <a href="http://appsurat.test/laporan/surat-keluar/{{ $dataMail['slug'] }}/{{ $dataMail['jenis_surat'] }}/{{ $dataMail['status'] }}?from=/laporan/surat-keluar" 
    style="text-decoration: none; color: #fff; padding:7px 10px; background: linear-gradient(to left, #155EFF, #548cf5); border-radius: 5px; letter-spacing: 1px"><b>Lihat</b></a>
    
    
    <p><b>Tanggal Surat :</b> {{ $dataMail['tanggal_surat'] }}</p>
    
</body>
</html>

