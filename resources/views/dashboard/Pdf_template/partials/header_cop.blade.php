<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View surat</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <style>   
        header p{
            line-height: 5px;
            font-family: Arial;
        }
        
        header .text-header-large{
            font-size: 18px;
            font-weight: bold;
            color: black;
        }
        
        header .text-small p{
            font-size: 11px;
            line-height: 0;
        }
        
        .title-surat p{
            line-height: 10px;
        }
        
        .title-surat,
        .body-name, 
        .content{
            font-family: 'Times New Roman', Times, serif;
        }
        
        .body-name, .body-content, .body-ttd{
            font-size: 12;
        }
        
        .body-ttd p{
            line-height: 0;
        }
        
        
        @media print{
            body{
                margin: 3mm 7mm 3mm 7mm;
            }
            
        }
        
    </style>
</head>
<body onload="window.print()">
    
    <div class="page">
        <header>
            <table cellpadding="5">
                <thead>
                    <tr>
                        <td class="text-end">
                            <img src="/img/logouin.png" width="85" alt="Logo UIN">
                        </td>
                        <td class="text-center pt-4">  
                            <div class="text-header-large">
                                <p>KEMENTERIAN AGAMA REPUBLIK INDONESIA</p>
                                <p>UNIVERSITAS ISLAM NEGERI AR-RANIRY BANDA ACEH</p>
                                <p style="font-size: 15px;">PRODI TEKNOLOGI INFORMASI FAKULTAS SAINS DAN TEKNOLOGI</p>
                            </div>
                            <div class="text-small">
                                <p>Jalan Syeikh Abdur Rauf Kopelma Darussalam Banda Aceh</p>
                                <p>Telepon 0651-7551 423/Fax: 0651-7553020 Situs : www.fst.uin.arraniry.ac.id</p>
                            </div>
                        </td>
                    </tr>
                </thead>     
            </table>
        </header>
        <hr class="border border-dark border-2 opacity-100" style="margin-top: -14px;">
        <hr class="border border-dark border opacity-100" style="margin-top: -14px;">
        
        
        <div class="content">
            @yield('body')
        </div>
        
        
    </div>
    
</body>
</html>