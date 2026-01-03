<div class="main-content">
    <section class="section">
        
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="section-title mb-0">DATA DOSEN</h2>
                <p class="text-muted mb-0">Universitas HEHE</p>
            </div>
            <div class="col-md-6 text-md-right text-left mt-3 mt-md-0">
                <a href="<?php echo base_url('DosenC/tambahdosen'); ?>" class="btn btn-primary">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Dosen
                </a>
            </div>
        </div>

        <div class="section-body">
            <div class="card shadow border-0">
                <div class="card-body p-0">
                    
                    <div class="p-4 border-bottom">
                        <form class="form">
                            <div class="form-row align-items-center">
                                <div class="col-auto mr-auto d-flex align-items-center">
                                    <label class="my-1 mr-2 text-muted">Show</label>
                                    <select class="custom-select mr-sm-2">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <span class="text-muted ml-1">entries</span>
                                </div>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-transparent border-right-0">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control border-left-0" placeholder="Search...">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0 align-middle">
                            <thead class="bg-light text-black"> 
                                <tr>
                                    <th class="text-center" style="width: 40px;">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Dosen</th>
                                    <th>NIDN</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                if(!empty($dosen)) {
                                    foreach($dosen as $dsn): 
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-<?php echo $dsn->nidn; ?>">
                                            <label for="checkbox-<?php echo $dsn->nidn; ?>" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    
                                    <td><?php echo $no++; ?></td>

                                    <td>
                                        <?php 
                                            $path_foto = 'public/img/dosen/' . $dsn->foto;
                                            if (!empty($dsn->foto) && file_exists(FCPATH . $path_foto)) {
                                                $img_src = base_url($path_foto) . '?t=' . time();
                                            } else {
                                                $img_src = 'https://ui-avatars.com/api/?name=' . urlencode($dsn->nama) . '&background=random&color=fff';
                                            }
                                        ?>
                                        <img alt="Foto" src="<?php echo $img_src; ?>" class="rounded-circle" width="35" height="35" style="object-fit: cover; border: 1px solid #ddd;" data-toggle="tooltip" title="<?php echo $dsn->nama; ?>">
                                    </td>
                                    
                                    <td class="font-weight-bold"><?php echo $dsn->nama; ?></td>
                                    <td><?php echo $dsn->nidn; ?></td>
                                    <td><?php echo $dsn->alamat; ?></td>
                                    <td><?php echo $dsn->telp; ?></td>
                                    <td><?php echo $dsn->email; ?></td>
                                    
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton-<?php echo $dsn->nidn; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="<?php echo base_url('DosenC/detail/'.$dsn->nidn); ?>"><i class="far fa-eye"></i> Detail</a>
                                                <a class="dropdown-item has-icon" href="<?php echo base_url('DosenC/editdosen/'.$dsn->nidn); ?>"><i class="far fa-edit"></i> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item has-icon text-danger" href="<?php echo base_url('DosenC/hapus/'.$dsn->nidn); ?>" onclick="return confirm('Yakin hapus data dosen ini?')"><i class="far fa-trash-alt"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    endforeach; 
                                } else {
                                    echo "<tr><td colspan='9' class='text-center p-4'>Data dosen tidak ditemukan</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>