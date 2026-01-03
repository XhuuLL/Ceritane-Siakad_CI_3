<main role="main" class="main-content">
    <div class="container-fluid">
        <h2 class="h4 mb-4">Edit Plotting Dosen Wali</h2>
        <div class="card shadow">
            <div class="card-body">
                <form action="<?= base_url('DosenWaliC/aksi_update'); ?>" method="post">
                    <input type="hidden" name="id_wali" value="<?= $wali->id_wali ?>">

                    <div class="form-group">
                        <label>Dosen Wali</label>
                        <select name="nidn" class="form-control" required>
                            <?php foreach($dosen as $d): ?>
                                <option value="<?= $d->nidn ?>" <?= ($d->nidn == $wali->nidn) ? 'selected' : '' ?>>
                                    <?= $d->nama ?> (<?= $d->nidn ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select name="nim" class="form-control" required>
                            <?php foreach($mhs as $m): ?>
                                <option value="<?= $m->nim ?>" <?= ($m->nim == $wali->nim) ? 'selected' : '' ?>>
                                    <?= $m->nama ?> (<?= $m->nim ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <input type="text" name="tahun_akademik" class="form-control" 
                                value="<?= $wali->tahun_akademik ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="aktif" <?= ($wali->status == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                            <option value="tidak" <?= ($wali->status == 'tidak') ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('DosenWaliC/index'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>