<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>Pesan Kontak Baru</title>
    </head>
    <body style="font-family: Arial, sans-serif; color: #333;">
        <h2>Pesan Kontak Baru dari Nias Coffee</h2>
        <p>Anda menerima pesan baru dari formulir kontak website.</p>
        <table cellspacing="0" cellpadding="8" style="border-collapse: collapse; width: 100%;">
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Nama</strong></td>
                <td style="border: 1px solid #ddd;">{{ $data['nama'] }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Email</strong></td>
                <td style="border: 1px solid #ddd;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd;"><strong>Pesan</strong></td>
                <td style="border: 1px solid #ddd; white-space: pre-line;">{{ $data['pesan'] }}</td>
            </tr>
        </table>
        <p>Silakan balas langsung ke alamat email tersebut untuk menanggapi pesan.</p>
    </body>
</html>
