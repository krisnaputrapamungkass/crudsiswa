<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
    <table >
    <tr>
        <th colspan="4">PERPUSTAKAAN Kambing Seahtera</th>
    </tr>
    <tr>
        <th colspan="4" >KAMBING</th>
    </tr> 
    <tr>
        <th colspan="4" >087282919839</th>
    </tr>    
    <tr>
        <th colspan="4" ><hr></th>
    </tr>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
    </tr>
        @php
        $no=0;
        @endphp
        @foreach ($data as $i )
            <tr>
                <td style="border: 1px solid black">{{ $no++ }}</td>
                <td style="border: 1px solid black">{{ $i->buku->judul_buku}}</td>
                <td style="border: 1px solid black">{{ $i->tanggal_pinjam}}</td>
                <td style="border: 1px solid black">{{ $i->tanggal_kembali}}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;" colspan="2">Peminjam</td>
                <td style="border: 1px solid black;">:</td>
                <td style="border: 1px solid black;">{{ $i->siswa->nama }}</td>
            </tr>
            <tr>
                <td colspan="4">kembalikan Tempat Waktu.
                <u><bold>jika Terlambat Denda 50rb Perhari</bold></td></u>
            </tr>

            <tr>
                <td>
                    <br>
                    Kediri,...........
                    <br>
                    Petugas
                    <br>
                    <br>
                    <div style="width: 100%: display: flex: flex-direction: colomn; margin-right: 5%:">
                        <label style="margin-top: 2%;">Kediri, {{ now()}}</label>
                        <div id="qrcode"></div>
                        <label style="margin-top: 2%;">{{ Auth::user()->name}}</label>
                    </div>
                    
                    <td colspan="2" ></td>
                    <td>
                        Kediri,...........
                        <br>
                        Peminjam
                        <br>
                        <br>
                        <br>
                        {{ $i->siswa->nama}}
                    </td>
                </td>
            </tr>
        @endforeach 
    </table>
</body>
</html>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include qrcode.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--javascript to gererate QR  code -->
<script>
    $(document).ready(function(){
        // generate QR code
        var username = "{{ Auth::user()->name }} \n"+" Tanggal : {{ now() }}"; 
        var qrText = "Diterima tangan di PT KAMBING\n"
        + username;
        var qr = new QRCode(document.getElementById("qrcode"),{
            text: qrText,
            width: 90, 
            height: 90
        });

        //Menunda percetakan dengan setTimeot
        setTimeout(function() {
            window.print(); //mencetak saat halaman memuat
        }, 500); // menunda percetakan selama 500 mili detik (0,5detik)
    });
</script>