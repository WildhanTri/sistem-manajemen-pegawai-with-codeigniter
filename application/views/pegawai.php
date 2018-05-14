<html>

<head>
    <title>Home Manajemen Pegawai</title>
    <?php $this->load->view('css'); ?>
    <?php $this->load->view('js'); ?>
</head>

<body>
    <?php $this->load->view('header') ?>
    <div class="container" style="padding-top:70px;">
        <h4>
            <a href="<?php echo base_url('index.php/pegawai/') ?>">
               Home
            </a> /
            <a href="<?php echo base_url('index.php/pegawai/dataPegawai') ?>">
               Data Pegawai
            </a>
        </h4>
    </div>
</body>

</html>
