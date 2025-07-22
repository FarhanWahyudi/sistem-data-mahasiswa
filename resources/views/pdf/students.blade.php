<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">NIM</th>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">NAMA</th>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">TANGGAL LAHIR</th>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">JURUSAN</th>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">GENDER</th>
                <th style="text-align: left; border: 1px solid #000; padding: 10px;">ALAMAT</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($students as $student)
                <tr>
                    <td style="border: 1px solid #000; padding: 10px;">{{ $student->nim }}</td>
                    <td style="border: 1px solid #000; padding: 10px;">{{ $student->name }}</td>
                    <td style="border: 1px solid #000; padding: 10px;">{{ \Carbon\Carbon::parse($student->birth_date)->locale('id')->translatedFormat('d F Y') }}</td>
                    <td style="border: 1px solid #000; padding: 10px;">{{ $student->major->name }}</td>
                    <td style="border: 1px solid #000; padding: 10px;">{{ $student->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td style="border: 1px solid #000; padding: 10px;">{{ $student->address }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>