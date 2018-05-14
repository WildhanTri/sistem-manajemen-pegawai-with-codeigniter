<html>

<head>
    <title>Home Manajemen Pegawai</title>
    <?php $this->load->view('css'); ?>
    <?php $this->load->view('js'); ?>
</head>

<body>
    <?php $this->load->view('header') ?>

    <div class="container" style="padding-top:70px;">
        <?php if($aksi == "lihatdata") : ?>
        <h4>Data Pegawai</h4>
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo base_url('idnex.php/pegawai/dataPegawai/tambah') ?>">
                    <button class="btn btn-info"><i class="fa fa-plus"></i> &nbsp; Add</button>
                </a>
                <table class="table table-stripped" id="data">
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
                    <?php if($pegawai != null) : ?>
                    <?php foreach($pegawai as $p) : ?>
                    <tr class="rowdata">
                        <td>
                            <?php echo $p->id_pegawai ?>
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
                                    <a href="<?php echo base_url().'index.php/pegawai/editPegawai/'.$p->id_pegawai ?>"><button class="btn btn-success" style="width:100%"><i class="fa fa-edit"></i>&nbsp; Edit</button></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url().'index.php/pegawai/hapusPegawai/'.$p->id_pegawai ?>"><button class="btn btn-danger" style="width:100%"> <i class="fa fa-trash-alt "></i>&nbsp; Delete</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="8" style="text-align:center">Data Kosong.</td>
                    </tr>
                    <?php endif ?>
                </table>
            </div>
        </div>
        <?php elseif($aksi == "editdata") : ?>
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo base_url('idnex.php/pegawai/dataPegawai/tambah') ?>">
                    <button class="btn btn-info"><i class="fa fa-plus"></i> &nbsp; Add</button>
                </a>
                <table class="table table-stripped" id="data">
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
                </table>
            </div>
        </div>
        <?php endif ?>
    </div>
    
</body>

</html>
