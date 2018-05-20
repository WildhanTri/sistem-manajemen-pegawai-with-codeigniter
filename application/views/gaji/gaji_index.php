<?php 
    function input($name, $id, $value, $class, $placeholder){
        $reg_input = array (
            'name' => $name,
            'id' => $id,
            'value' => $value,
            'class' => $class,
            'placeholder' => $placeholder,
            'autocomplete' => 'off',
        );
        
        return $reg_input;
    }

?>

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

    .table-data-gaji tr td {
        cursor: pointer;
    }

    .tab-gaji {
        text-align: center;
        border: 1px solid black;
        padding: 10px;
    }

    .active-tab {
        background: #007bff !important;
        border-radius: 10px 10px 0px 0px
    }

    .active-tab a {
        color: white !important;
        background: none !important;
    }

</style>

<body>
    <?php $this->load->view('component/header') ?>
    <div class="container" style="padding-top:70px;">
        <h4><a href="<?php echo base_url('') ?>"><i class="fa fa-arrow-left  "></i></a>Data Gaji</h4>
        <div class="row">
            <div class="col-sm-12" style="padding:15px;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item active-tab tab-menu" onclick="kliktab('0')">
                        <a class="nav-link" href="#">Data Gaji Pegawai &nbsp; <i class="far fa-credit-card  "></i></a>
                    </li>
                    <li class="nav-item tab-menu" onclick="kliktab('1')">
                        <a class="nav-link" href="#">Transfer Gaji &nbsp; <i class="fa fa-exchange-alt "></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">History Transfer &nbsp; <i class="fa fa-history "></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row tab-content">
            <div class="col-sm-8">
                <table class="table table-stripped table-hover table-data-gaji" id="data" style="border:1px solid #dedede">
                    <thead class="thead-dark">
                        <tr>
                            <th onclick="prosesSortSiswa('nisn', 'DESC', this)" id="sortByNISN">ID Pegawai</th>
                            <th onclick="prosesSortSiswa('nama', 'DESC', this)" id="sortByNama">Nama Pegawai</th>
                            <th onclick="prosesSortSiswa('kelas', 'DESC', this)" id="sortByKelas">Jabatan Pegawai</th>
                            <th onclick="prosesSortSiswa('kelas', 'DESC', this)" id="sortByKelas">Gaji Pokok</th>
                        </tr>
                    </thead>
                    <?php $no = $this->uri->segment('3') + 1; if($pegawai != null) : ?>
                    <?php foreach($pegawai as $p) : ?>
                    <tr class="rowdata">
                        <td>
                            <?php echo $p->id_pegawai; ?>
                        </td>
                        <td>
                            <?php echo $p->nama_depan." ".$p->nama_tengah." ".$p->nama_belakang ?>
                        </td>
                        <td>
                            <?php echo $p->nama_jabatan ?>
                        </td>
                        <td>
                            Rp.
                            <?php echo number_format($p->gaji_pokok,2,",",".") ?>
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
            <div class="col-sm-4">
                <table class="table table-sm table-stripped" id="data" style="border:1px solid #dedede">
                    <tr>
                        <td>Nama :</td>
                    </tr>
                    <tr>
                        <td>Januari</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Februari</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Maret</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>April</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Mei</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Juni</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Juli</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Agustus</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>September</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Oktober</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>November</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                    <tr>
                        <td>Desember</td>
                        <td><i class="fa fa-times"></i></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row tab-content" style="display:none;">
            <div class="col-sm-12">
                <?php form_open ('gaji/proses_tambah_pegawai') ?>
                <div class="row">
                    <div class="col-sm-4" style="padding:5px 15px">
                        ID
                    </div>
                    <div class="col-sm-4" style="padding:5px 15px">
                        <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Masukkan ID Pegawai...')) ?>
                    </div>
                    <div class="col-sm-4" style="padding:5px 15px">
                        Nama : 
                    </div>
                    <div class="col-sm-4" style="padding:5px 15px">
                        Waktu Transfer
                    </div>
                    <div class="col-sm-8" style="padding:5px 15px">
                        <?php echo form_input (input('date_begin', 'date_begin', '', 'form-control', 'Masukkan Waktu Transfer...')) ?>
                    </div>
                    <div class="col-sm-4" style="padding:5px 15px">
                        Jumlah Gaji
                    </div>
                    <div class="col-sm-8" style="padding:5px 15px">
                        <div class="row">
                            <div class="col-sm-3">
                                Gaji Pokok :
                            </div>
                            <div class="col-sm-9">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Masukkan ID Pegawai...')) ?>
                            </div>

                            <div class="col-sm-3">
                                Gaji Tunjangan :
                            </div>
                            <div class="col-sm-9">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Masukkan ID Pegawai...')) ?>
                            </div>

                            <div class="col-sm-3">
                                Gaji Total :
                            </div>
                            <div class="col-sm-9">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Masukkan ID Pegawai...')) ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4" style="padding:5px 15px">
                        Perubahan Gaji &nbsp;
                        <button class="btn btn-info"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="col-sm-8" style="padding:5px 15px">
                        <div class="row">
                            <div class="col-sm-1" style="padding:5px">
                                <?php echo form_dropdown('status_menikah', array("+" => "+", "-" => "-"), "", array('class'=>'form-control', 'id'=>'statusmenikah' ,'style' => 'padding:5px;')) ?>
                            </div>
                            <div class="col-sm-1" style="padding:5px">
                                <?php echo form_dropdown('status_menikah', array("Rp" => "Rp","%" => "%"), "", array('class'=>'form-control', 'id'=>'statusmenikah','style' => 'padding:5px;')) ?>
                            </div>
                            <div class="col-sm-3" style="padding:5px">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Nilai Perubahan...')) ?>
                            </div>
                            <div class="col-sm-6" style="padding:5px">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Keterangan Perubahan...')) ?>
                            </div>
                            <div class="col-sm-1" style="padding:5px">
                                <button class="btn btn-danger">&times;</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4" style="padding:5px 15px">
                        Gaji Final
                    </div>
                    <div class="col-sm-8" style="padding:5px 15px">
                        <div class="row">
                            <div class="col-sm-12" style="padding:5px">
                                <?php echo form_input (input('id_pegawai', '', '', 'form-control', 'Keterangan Perubahan...')) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <?php echo form_submit('save', 'Kirim',array("class" => "btn btn-success", "style"=>"width:100%")); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $('#date_begin,#date_end').datetimepicker();

    function kliktab(id) {
        var tabmenu = $('.tab-menu');
        var tabcontent = $('.tab-content');
        for (a = 0; a < tabcontent.length; a++) {
            $(tabcontent[a]).attr("style", "display:none");
            $(tabmenu[a]).removeClass("active-tab");
            console.log(tabmenu[a]);
        }
        $(tabcontent[id]).attr("style", "display:flex");
        $(tabmenu[id]).addClass("active-tab");
    }

</script>
