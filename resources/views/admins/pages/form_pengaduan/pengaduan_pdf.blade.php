<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            margin: 20px auto;
        }

        h1 {
            font-size: 2em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        thead {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .file-link {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="fs-1 mb-5">Management Pengaduan</h1>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Isi Pengaduan</th>
                    <th>Waktu Pengaduan</th>
                    <th>Status</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($pengaduan as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ ucfirst($row->user->name) }}</td>
                        <td>{{ ucfirst($row->isi_pengaduan) }}</td>
                        <td>{{ date('d M Y', strtotime($row->waktu_pengaduan)) }}</td>
                        <td>{{ ucfirst($row->status) }}</td>
                        <td>
                            @if ($row->file)
                                <span>{{ $row->file }}</span>
                            @else
                                <span>File tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
