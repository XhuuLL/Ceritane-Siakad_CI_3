<div class="main-content">
    <section class="section">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="section-title mb-0">DATA DOSEN WALI</h2>
                <p class="text-muted mb-0">Manajemen Bimbingan Akademik</p>
            </div>
            <div class="col-md-6 text-md-right mt-3 mt-md-0">
                <a href="<?= base_url('DosenWaliC/tambah'); ?>" class="btn btn-primary">
                    <i class="fas fa-link mr-2"></i> Plotting Dosen Wali
                </a>
            </div>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card shadow border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-light text-black">
                            <tr>
                                <th>No</th>
                                <th>Dosen Wali</th>
                                <th>Mahasiswa</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($wali as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <strong><?= $row->nama_dosen ?></strong><br>
                                    <small class="text-muted"><?= $row->nidn ?></small>
                                </td>
                                <td>
                                    <?= $row->nama_mhs ?><br>
                                    <small class="text-muted"><?= $row->nim ?></small>
                                </td>
                                <td><?= $row->tahun_akademik ?></td>
                                <td>
                                    <span class="badge badge-<?= $row->status == 'aktif' ? 'success' : 'danger' ?>">
                                        <?= ucfirst($row->status) ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('DosenWaliC/edit/'.$row->id_wali) ?>" 
                                       class="btn btn-sm btn-outline-primary mr-1" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <a href="<?= base_url('DosenWaliC/hapus/'.$row->id_wali) ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Hapus relasi bimbingan ini?')" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>