<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notif</title>
</head>


<body>
    <h1 style="text-align: center; color: #4CAF50;">Pemberitahuan Jadwal Bimbingan</h1>
    <p>
        Halo {{ $dosenName }} selaku dosen dan {{ $mahasiswaName }} sebagai mahasiswa, <br>
        Jadwal bimbingan baru sudah dibuat berikut jadwalnya: <br>
        <ul style="list-style-type: none; padding: 0;">
            <li style="margin-bottom: 10px;">
                <strong>Tanggal:</strong> {{ $bimbingans->tanggal }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Jam:</strong> {{ $bimbingans->jam_bimbingan }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Topik:</strong> {{ $bimbingans->topik }}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Lokasi:</strong> {{ $bimbingans->lokasi }}
            </li>
        </ul>
        Silahkan di cek terlebih dahulu jadwal anda di sistem untuk melihat informasi lebih lanjut.
    </p>

    <p>Halo {{ $dosenName }} (Dosen) dan {{ $mahasiswaName }} (Mahasiswa), Hari ini adalah jadwal bimbingan anda yang akan dilaksanakan</p>
    <p style="text-align: center; color: #555;">Terima Kasih</p>
</body>

</html>
