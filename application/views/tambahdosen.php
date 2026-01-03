<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 my-4">
                        
                        <h2 class="h4 mb-1">Tambah Data Dosen</h2>
                        
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="toolbar">
                                    <form action="<?php echo base_url('DosenC/aksi_tambah'); ?>" method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Nama Dosen</label>
                                            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama lengkap">
                                        </div>

                                        <div class="form-group">
                                            <label>NIDN</label>
                                            <input type="number" name="nidn" class="form-control" required placeholder="Masukkan NIDN">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" required placeholder="Masukkan alamat lengkap">
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="number" name="telp" class="form-control" required placeholder="Masukkan nomor telepon">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" required placeholder="Masukkan email aktif">
                                        </div>

                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*">
                                            <small class="text-muted">Format: jpg, png, jpeg. Max 2MB.</small>
                                        </div>

                                        <div class="form-group mt-4">
                                            <a href="<?php echo base_url('DosenC/index'); ?>" class="btn mb-2 btn-secondary">Batal</a>
                                            <button type="reset" class="btn mb-2 btn-warning">Reset</button>
                                            <button type="submit" class="btn mb-2 btn-primary">Simpan</button>
                                        </div>

                                    </form>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</main>