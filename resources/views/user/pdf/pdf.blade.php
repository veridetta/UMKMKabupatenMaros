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
        <h4 class="paragraf">Formulir Pendaftaran Peserta Didik Baru Tahun 2022</h4>
    </div>

    <div>
        {{-- <img src="{{ public_path("storage"."/".$siswa->foto) }}" alt="foto" width="30%" >         --}}
        <table width="100%">
            <tr>
                <td width="0.5%"><b>1.</b></td>
                <td width="3%">
                    <b>Registrasi Peserta Didik</b>
                </td>
                <td width="5%"></td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nama Pemilik</td>
                <td width="5%">{{': '.$umkm->nama_pemilik}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Tempat Lahir</td>
                <td width="5%">{{': '.$umkm->tempat_lahir}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Tanggal Lahir</td>
                <td width="5%">{{': '.\Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tanggal_lahir)
                    ->format('d M Y');}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jenis Kelamin</td>
                <td width="5%">{{': '.$umkm->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Agama</td>
                <td width="5%">{{': '.$umkm->agama}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Kewarganegaraan</td>
                <td width="5%">{{': '.$umkm->kewarganegaraan}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nama Usaha</td>
                <td width="5%">{{': '.$umkm->nama_usaha}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jenis Usaha</td>
                <td width="5%">{{': '.$umkm->jenis_usaha}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nomor Induk Kependudukan (NIK)</td>
                <td width="5%">{{': '.$umkm->nik}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Nomor NIB / P-IRT/NPWP</td>
                <td width="5%">{{': '.$umkm->nib}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Modal</td>
                <td width="5%">{{': '.$umkm->modal}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Jumlah Karyawan</td>
                <td width="5%">{{': '.$umkm->jumlah_karyawan}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Tanggal Mulai Usaha</td>
                <td width="5%">{{': '.\Carbon\Carbon::createFromFormat('Y-m-d', $umkm->tanggal_mulai_usaha)
                    ->format('d M Y');}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Email</td>
                <td width="5%">{{': '.$umkm->email}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">No Handphone</td>
                <td width="5%">{{': '.$umkm->no_hp}}</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%">Alamat Rumah </td>
                <?php  $alamat_rumah = $umkm->alamat_rumah." RT ".$umkm->rt_rumah." RW ".$umkm->rw_rumah." Desa/Keluarahan ".$umkm->desa_rumah." Kecamatan ".$umkm->kecamatan_rumah." Kabupaten/Kota ".$umkm->kabupaten_rumah." Provinsi ".$umkm->provinsi_rumah." Kode Pos ".$umkm->kode_pos_rumah;?>
                <td width="5%">{{': '.$alamat_rumah}}</td>
            </tr>
            <tr>
                <td></td>
                <?php  $alamat_usaha = $umkm->alamat_usaha." RT ".$umkm->rt_usaha." RW ".$umkm->rw_usaha." Desa/Keluarahan ".$umkm->desa_usaha." Kecamatan ".$umkm->kecamatan_usaha." Kabupaten/Kota ".$umkm->kabupaten_usaha." Provinsi ".$umkm->provinsi_usaha." Kode Pos ".$umkm->kode_pos_usaha;?>
                <td width="3%">Alamat Usaha</td>
                <td width="5%">{{': '.$alamat_usaha}}</td>
            </tr>            
        </table>
        <table style="margin-top: 10%" width="100%">
            <tr height="100%">    
                <td><img src="https://api.qrserver.com/v1/create-qr-code/?data={{$umkm->nik.'-'.$umkm->nama_pemilik}}&amp;size=100x100" alt=""></td>
                <td><img src="{{ public_path("storage"."/".$umkm->foto) }}" alt="foto" width="50%"></td>
                <td width="30%">
                    <p>Maros, {{date('d-M-Y')}}</p>
                    <p>Pendaftar</p>
                    <br/>
                    <br/>
                    <br/>
                    <b>{{$umkm->nama_pemilik}}</b>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>