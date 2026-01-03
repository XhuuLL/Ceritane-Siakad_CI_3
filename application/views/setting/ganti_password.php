<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="h3 mb-4 page-title">Pengaturan Akun</h2>
                
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> <?= $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Ganti Password</strong>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('SettingC/aksi_update_password'); ?>" method="post">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?= $this->session->userdata('username'); ?>" readonly>
                                <small class="text-muted">Username tidak dapat diubah demi keamanan.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pass_baru">Password Baru</label>
                                <input type="password" name="pass_baru" class="form-control" required placeholder="Masukkan password baru" maxlength="50">
                            </div>
                            <div class="form-group mb-3">
                                <label for="konfirmasi_pass">Konfirmasi Password Baru</label>
                                <input type="password" name="konfirmasi_pass" class="form-control" required placeholder="Ulangi password baru" maxlength="50">
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>