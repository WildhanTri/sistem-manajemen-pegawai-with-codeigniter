<html>

<head>
    <title>Home Manajemen Pegawai</title>
    <?php $this->load->view('css'); ?>
    <?php $this->load->view('js'); ?>
</head>

<body>
    <?php $this->load->view('component/header') ?>
    <div class="container" style="padding-top:70px;">
        <a href="<?php base_url("index.php/main/") ?>"><h4>Home</h4></a>
        <div class="row">
            <div class="col-sm-4" style="padding-top:10px; padding-bottom:10px">
                <a href="<?php echo base_url("index.php/pegawai/tampil_data_pegawai") ?>">
                    <div class="card" style="width:100%; height:250px;">
                        <div class="card-body" style="text-align:center">
                            <h1 style="font-size:120px; color: #00aeff;"><i class="fa fa-users"></i></h1>
                            <h4 class="card-title">Data Pegawai</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4" style="padding-top:10px; padding-bottom:10px">
                <a href="<?php echo base_url("index.php/pegawai/dataGaji") ?>">
                    <div class="card" style="width:100%; height:250px;">
                        <div class="card-body" style="text-align:center">
                            <h1 style="font-size:120px; color: #a8e775;"><i class="fas fa-money-bill-alt"></i></h1>
                            <h4 class="card-title">Gaji Pegawai</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4" style="padding-top:10px; padding-bottom:10px">
                <a href="<?php echo base_url("index.php/pegawai/dataAbsen") ?>">
                    <div class="card" style="width:100%; height:250px;">
                        <div class="card-body" style="text-align:center">
                            <h1 style="font-size:120px; color: #f0b52a;"><i class="fas fa-id-card"></i></h1>
                            <h4 class="card-title">Absensi Pegawai</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4" style="padding-top:10px; padding-bottom:10px">
                <a href="<?php echo base_url("index.php/pegawai/settings") ?>">
                    <div class="card" style="width:100%; height:250px;">
                        <div class="card-body" style="text-align:center">
                            <h1 style="font-size:120px; color: #b3b3b3"><i class="fa fa-cogs "></i></h1>
                            <h4 class="card-title">Pengaturan</h4>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</body>

</html>
