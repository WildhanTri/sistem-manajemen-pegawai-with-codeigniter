<html>

<head>
    <title>Home Manajemen Pegawai</title>
    <?php $this->load->view('css'); ?>
    <?php $this->load->view('js'); ?>
</head>
<style>
    .rowdata td {
        vertical-align: middle !important;
    }
    
    .table tr td {
        color: #636363;
        font-size: 13px;
    }
    
</style>
<body>
    <?php $this->load->view('component/header') ?>
    <div class="container" style="padding-top:70px;">
        <h4><a href="<?php echo base_url('') ?>"><i class="fa fa-arrow-left  "></i></a>Data Pegawai</h4>
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo base_url('index.php/pegawai/tampil_tambah_pegawai') ?>">
                    <button class="btn btn-info"><i class="fa fa-plus"></i> &nbsp; Add</button>
                </a>
                <table class="table table table-hover" id="data">
                    <thead class="thead-dark">
                    <tr>
                        <th onclick="prosesSortSiswa('nisn', 'DESC', this)" id="sortByNISN">ID Pegawai</th>
                        <th onclick="prosesSortSiswa('nama', 'DESC', this)" id="sortByNama">Nama Pegawai</th>
                        <th onclick="prosesSortSiswa('kelas', 'DESC', this)" id="sortByKelas">Jabatan Pegawai</th>
                        <th onclick="prosesSortSiswa('alamat', 'DESC', this)" id="sortByAlamat">Alamat</th>
                        <th onclick="prosesSortSiswa('alamat', 'DESC', this)" id="sortByAlamat">Agama</th>
                        <th onclick="prosesSortSiswa('alamat', 'DESC', this)" id="sortByAlamat">Telepon</th>
                        <th onclick="prosesSortSiswa('alamat', 'DESC', this)" id="sortByAlamat">Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php $no = $this->uri->segment('3') + 1; if($pegawai != null) : ?>
                    <?php foreach($pegawai as $p) : ?>
                    <tr class="rowdata">
                        <td style="text-align:center">
                            <?php echo $p->id_pegawai; ?>
                        </td>
                        <td>
                            <?php echo $p->nama_depan." ".$p->nama_tengah." ".$p->nama_belakang ?>
                        </td>
                        <td>
                            <?php echo $p->nama_jabatan ?>
                        </td>
                        <td>
                            <?php echo $p->alamat_pegawai ?>
                        </td>
                        <td>
                            <?php echo $p->nama_agama ?>
                        </td>
                        <td>
                            <?php echo $p->telepon_pegawai ?>
                        </td>
                        <td>
                            <?php echo $p->email_pegawai ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url().'index.php/pegawai/tampil_edit_pegawai/'.$p->id_pegawai ?>"><button class="btn btn-success" style="width:100%"><i class="fa fa-edit"></i>&nbsp; Edit</button></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url().'index.php/pegawai/hapus_pegawai/'.$p->id_pegawai ?>"><button class="btn btn-danger" style="width:100%"> <i class="fa fa-trash-alt "></i>&nbsp; Delete</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach ?>
                    <tr>
                        <td>
                            <div class="halaman">Halaman :
                                <?php 
	                               echo $this->pagination->create_links();
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php else : ?>
                    <tr>
                        <td colspan="8" style="text-align:center">Data Kosong.</td>
                    </tr>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
