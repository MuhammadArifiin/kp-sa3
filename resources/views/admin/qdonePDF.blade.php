<!DOCTYPE html>
<html>

<head>
    <title>Data Transaksi</title>
</head>

<body>
    <h3 align="center">Data Antrian Selesai</h3>
    <table border="1" align="center" cellpadding="10" cellspacing="0">
        <thead>
            <tr bgcolor="grey">
                <th>No</th>
                <th>KODE ANTREAN</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>HP</th>
                {{-- <th>FAKULTAS</th>
                <th>JURUSAN</th> --}}
                <th>STATUS</th>
                <th>KETERANGAN PENGAMBIL</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($printedData as $p)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->kode }}</td>
                <td>{{ $p->nim }}</td>
                <td>{{ $p->nama}}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->hp }}</td>
                {{-- <td>{{ $p->fakultas }}</td> --}}
                {{-- <td>{{ $p->jurusan }}</td> --}}
                <td>{{ $p->status }}</td>
                <td>{{ $p->pengambil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>