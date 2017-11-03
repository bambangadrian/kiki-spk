<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$data = include_once('data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
<div class="container main">
    <div class="container">
        <div class="block block-12">
            <div class="panel">
                <h1 class="panel title">Warga</h1>
                <div class="panel header">
                    <div class="panel message">
                        <div class="error">
                            This is error message
                        </div>
                        <div class="success">
                            This is success message
                        </div>
                        <div class="info">
                            This is info message
                        </div>
                    </div>
                </div>
                <div class="panel content">
                    <div class="block block-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form field">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" name="nama" />
                            </div>
                            <div class="form field">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat"></textarea>
                            </div>
                            <div class="form field">
                                <label for="kondisi_rumah">Kondisi Rumah</label>
                                <select id="kondisi_rumah" name="kondisi_rumah">
                                    <?php foreach ($data['kondisi_rumah'] as $row): ?>
                                        <option value="<?php $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="penghasilan">Kondisi Rumah</label>
                                <select id="penghasilan" name="penghasilan">
                                    <?php foreach ($data['penghasilan'] as $row): ?>
                                        <option value="<?php $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select id="pekerjaan" name="pekerjaan">
                                    <?php foreach ($data['pekerjaan'] as $row): ?>
                                        <option value="<?php $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="tanggungan">Jumlah Tanggungan</label>
                                <select id="tanggungan" name="tanggungan">
                                    <?php foreach ($data['tanggungan'] as $row): ?>
                                        <option value="<?php $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="aset">Aset Pribadi</label>
                                <select id="aset" name="aset">
                                    <?php foreach ($data['aset'] as $row): ?>
                                        <option value="<?php $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form button">
                                <input type="submit" name="submit" value="Save" />
                                <input type="reset" name="submit" value="reset" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
