<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i> Tambah Mahasiswa
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($mahasiswa as $mhs): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $mhs->nim; ?></td>
                                    <td><?php echo $mhs->nama; ?></td>
                                    <td><?php echo $mhs->alamat; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $mhs->nim; ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        
                                        <a href="<?php echo base_url('MahasiswaC/hapus/' . $mhs->nim); ?>" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('MahasiswaC/aksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach($mahasiswa as $mhs): ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit<?php echo $mhs->nim; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?php echo base_url('MahasiswaC/update'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $mhs->nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $mhs->alamat; ?>" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>