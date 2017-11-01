<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
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
        <div class="block block-4">
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
                        <form>
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
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="block block-12">
                        <form>
                            <div class="form field">
                                <label for="kondisi_rumah">Kondisi Rumah</label>
                                <select id="kondisi_rumah" name="kondisi_rumah">
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="penghasilan">Penghasilan</label>
                                <select id="penghasilan" name="penghasilan">
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select id="pekerjaan" name="pekerjaan">
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="block block-12">
                        <form>
                            <div class="form field">
                                <label for="jumlah_tanggungan">Jumlah Tanggungan</label>
                                <select id="jumlah_tanggungan" name="jumlah_tanggungan">
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="aset_pribasi">Aset Pribadi</label>
                                <select id="aset_pribasi" name="aset_pribasi">
                                    <option value="jelek">Jelek</option>
                                    <option value="sedang">sedang</option>
                                    <option value="mewah">Mewah</option>
                                </select>
                            </div>
                            <div class="form button">
                                <input type="submit" name="submit" value="Login" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
