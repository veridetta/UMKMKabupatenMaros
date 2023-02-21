<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .rangkasurat{
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 1%;
        }
        .table{
            border-bottom: 3px solid #000;
            padding: 1%;
        }
        .tengah{
            text-align: center;
            line-height: 9%
        }
        .paragraf{
            text-align: center;
            margin-top: 5%;
            /* font-weight: 500; */
        }
       
    </style>
</head>
<body>
    <div class="rangkasurat">
        <table width="100%" class="table">
            <tr>
                <td>
                    <img src="{{asset('img/logo.jpg')}}" width="100px" alt="">
                <td class="tengah">
                    <h4>KEMENTRIAN AGAMA REPUBLIK INDONESIA</h4>
                    <h4>KANTOR KEMENTRIAN AGAMA KABUPATEN PANGKEP</h4>
                    <h4>MADRASAH ALIYAH NEGERI (MAN) PANGKAJENE KEPULAUAN</h4>
                    <p>Jl. Raya Talaka KM.65 Telp. (0410) 5315304, Fax(0410) 2315304</p>
                    <p>Kode Pos 90654 Ma'rang</p>
                    <p>Email: man.pangkep@gmail.com</p>
                </td>
                </td>
            </tr>

        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div>
        {{-- <img src="{{ public_path("storage"."/".$umkm->foto) }}" alt="foto" width="30%" >         --}}
        <table width="80%">
            
            <tr>
                <td width="30%" rowspan="6">
                  <img src="{{ public_path("storage"."/".$umkm->foto) }}" alt="foto" width="120px" height="150px" border="2">
                </td>
                <td>Nama Pemilik</td>
                <td>{{': '.$umkm->nama_pemilik}}</td>
            </tr>
            <tr>
                
                <td>Nama Usaha</td>
                <td>{{': '.$umkm->nama_usaha}}</td>
            </tr>
            <tr>
                
                <td>Jenis Usaha</td>
                <td>{{': '.$umkm->jenis_usaha}}</td>
            </tr>
            <tr>
            <tr>
            
                <td>NIK</td>
                <td>{{': '.$umkm->nik}}</td>
            </tr>
            <tr>
                
                <td>Nomor NIB / P-IRT/NPWP</td>
                <td>{{': '.$umkm->nib}}</td>
            </tr>
            <tr>
                
                <td>Alamat Rumah</td>
                <?php  $alamat_rumah = $umkm->alamat_rumah." RT ".$umkm->rt_rumah." RW ".$umkm->rw_rumah." Desa/Keluarahan ".$umkm->desa_rumah." Kecamatan ".$umkm->kecamatan_rumah." Kabupaten/Kota ".$umkm->kabupaten_rumah." Provinsi ".$umkm->provinsi_rumah." Kode Pos ".$umkm->kode_pos_rumah;?>
                <td>{{': '.$alamat_rumah}}</td>
            </tr>
            <tr>
               
                <td>Alamat Usaha</td>
                <?php  $alamat_usaha = $umkm->alamat_usaha." RT ".$umkm->rt_usaha." RW ".$umkm->rw_usaha." Desa/Keluarahan ".$umkm->desa_usaha." Kecamatan ".$umkm->kecamatan_usaha." Kabupaten/Kota ".$umkm->kabupaten_usaha." Provinsi ".$umkm->provinsi_usaha." Kode Pos ".$umkm->kode_pos_usaha;?>
                <td>{{': '.$alamat_usaha}}</td>
            </tr> 
            <tr>
                
                <td>Modal</td>
                <td>{{': '.$umkm->modal}}</td>
            </tr>
            <tr>
                
                <td>Jumlah Karyawan</td>
                <td>{{': '.$umkm->jumlah_karyawan}}</td>
            </tr>
            <tr>
                
                <td>Email</td>
                <td>{{': '.$umkm->email}}</td>
            </tr>
            <tr>
                
                <td>Nomor Handphone</td>
                <td>{{': '.$umkm->no_hp}}</td>
            </tr>
            <br>  
            <br>  
            <tr>
                <td align="left" colspan="2">Kepala Sekolah</td>
            </tr>
            <tr style="margin-top: 10px;width:30% ;">
                <td align="left" colspan="2">{{$umkm->nama_usaha}}</td>
            </tr>
            <br>
            <br>
            <br>
            <br>
            <tr style="margin-top: 10px;">
                <td align="left" colspan="2">{{$umkm->nama_pemilik}}</td>
            <tr style="margin-top: 10px;">
                <td align="left" colspan="2">{{$umkm->nik}}</td>
            </tr>
           
        </table>
        
        
    </div>
</body>
</html>