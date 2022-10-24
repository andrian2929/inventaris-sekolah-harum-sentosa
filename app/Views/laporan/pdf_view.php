<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF CodeIgniter 4 - qadrLabs</title>

</head>

<body>
    <h2 style="text-align:center">Inventaris Harum Sentosa </h2>
    <table border="1" width="100%" cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr bgcolor="gray">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Asal Dana</th>
                <th>Unit</th>
                <th>Ruangan</th>
                <th>Harga</th>
                <th>Tanggal Pembukuan</th>
            </tr>
        </thead>
        <tbody>

            <?php if ($barangs) : ?>
                <?php $i = 1; ?>
                <?php foreach ($barangs as $barang) : ?>
                    <tr style="height:200px">
                        <td style="height:15px;"><?= $i++; ?></td>
                        <td style="height:15px;"><?= $barang['kode_barang']; ?></td>
                        <td style="height:15px;"><?= $barang['nama_barang']; ?></td>
                        <td style="height:15px;"><?= $barang['merek_barang']; ?></td>
                        <td style="height:15px;"><?= $barang['asal_barang']; ?></td>
                        <td style="height:15px;"><?= $barang['unit_barang']; ?></td>
                        <td style="height:15px;"><?= $barang['lokasi_barang']; ?></td>
                        <td style="height:15px;">
                            <?php
                            $fmt = numfmt_create('id_ID', NumberFormatter::CURRENCY);
                            echo numfmt_format_currency($fmt, $barang['harga_barang'], "IDR")

                            ?>
                        </td>
                        <td style="height:15px;"><?= $barang['tanggal_pembukuan']; ?></td>
                    </tr>
                <?php endforeach; ?>

            <?php else : ?>
                <tr>
                    <td colspan="9">
                        <p>Data tidak ada</p>
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
</body>

</html>