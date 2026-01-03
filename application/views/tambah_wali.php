<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h4 mb-4">Plotting Dosen Wali</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?= base_url('DosenWaliC/aksi_tambah'); ?>" method="post">
                            
                            <div class="form-group">
                                <label>Pilih Dosen</label>
                                <select name="nidn" class="form-control" required>
                                    <option value="">-- Pilih Dosen --</option>
                                    <?php foreach($dosen as $d): ?>
                                        <option value="<?= $d->nidn ?>"><?= $d->nama ?> (<?= $d->nidn ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pilih Mahasiswa</label>
                                <select name="nim" class="form-control" required>
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    <?php foreach($mhs as $m): ?>
                                        <option value="<?= $m->nim ?>"><?= $m->nama ?> (<?= $m->nim ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <input type="text" name="tahun_akademik" class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label>Status Bimbingan</label>
                                <select name="status" class="form-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak">Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <a href="<?= base_url('DosenWaliC/index'); ?>" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>