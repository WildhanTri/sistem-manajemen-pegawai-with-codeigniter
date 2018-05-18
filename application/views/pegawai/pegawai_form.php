<html>
<?php
    $atribut = array ('class' => 'email', 'id' => 'myform');
    
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
    function checkbox($name, $id, $value, $class){
        $reg_input = array (
            'name' => $name,
            'id' => $id,
            'value' => $value,
            'class' => $class
        );
        
        return $reg_input;
    }
    
    $readonly = array('readonly' => 'true');
    foreach ($jabatan as $j) {
       $jabatans[$j->id_jabatan] = $j->nama_jabatan;
    }
    foreach ($agama as $a) {
       $agamas[$a->id_agama] = $a->nama_agama;
    }
?>

    <head>
        <title>Home Manajemen Pegawai</title>
        <?php $this->load->view('css'); ?>
        <?php $this->load->view('js'); ?>
    </head>
    <style>
        .table tr td {
            vertical-align: middle;
        }

        .table tr td label {
            margin-bottom: 0px;
        }

        .table tr td input {
            font-size: 13px;
        }

    </style>

    <body>
        <?php $this->load->view('component/header') ?>

        <div class="container" style="padding-top:70px;">

            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open ('pegawai/proses_tambah_pegawai'); ?>
                    <table class="table table-stripped" id="data" style="border:1px solid #e9e9e9; font-size:13px;">
                        <tr>
                            <td colspan="4">
                                <h4><a href="<?php echo base_url('index.php/pegawai/tampil_data_pegawai') ?>"><i class="fa fa-arrow-left  "></i></a> &nbsp; Tambah Pegawai</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color:#007bff !important; color:white">
                                <h5>Profil Pegawai</h5>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:10%">
                                <label>ID Pegawai</label>
                            </td>
                            <td style="width:40%">
                                <?php echo form_input (input('id_pegawai', '', $id, 'form-control', 'Masukkan Nama Pegawai...'), '', $readonly) ?>
                            </td>
                            <td style="width:10%">
                                <label>Nama Pegawai</label>
                            </td>
                            <td style="width:40%">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_input (input('nama_depan', '', '', 'form-control', 'Nama Depan...')); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo form_input (input('nama_tengah', '', '', 'form-control', 'Nama Tengah...')); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo form_input (input('nama_belakang', '', '', 'form-control', 'Nama Belakang...')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Jabatan</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('jabatan_pegawai', $jabatans, '', array('class'=>'form-control', 'id' => 'jabatan_pegawai', 'onchange' => 'salaryRange(this)')) ?>
                            </td>
                            <td>
                                <label>Status Menikah</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('status_menikah', array("belum menikah" => "Belum Menikah", "menikah" => "Menikah"), '', array('class'=>'form-control', 'id'=>'statusmenikah')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Jumlah Anak</label>
                            </td>
                            <td>
                                <?php echo form_input (input('jumlah_anak', 'jumlahanak', '0', 'form-control', 'Masukkan Jumlah Anak...')); ?>
                            </td>
                            <td>
                                <label>Agama</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('agama_pegawai', $agamas, '', array('class'=>'form-control')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Telepon</label>
                            </td>
                            <td>
                                <?php echo form_input (input('telepon_pegawai', '', '', 'form-control', 'Masukkan Telepon Pegawai...')); ?>
                            </td>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <?php echo form_input (input('email_pegawai', '', '', 'form-control', 'Masukkan Email Pegawai...')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Alamat</label>
                            </td>
                            <td colspan="3">
                                <?php echo form_input (input('alamat_pegawai', '', '', 'form-control', 'Masukkan Alamat Pegawai...')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color:#007bff !important; color:white">
                                <h5>Gaji</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gaji Pokok</label>
                            </td>
                            <td>
                                <?php echo form_input (input('gaji_pokok', 'gaji_pokok', '0', 'form-control', 'Masukkan Nilai Gaji...'), '', array("onkeyup" => "hitungTotalGaji()")) ?>
                            </td>
                            <td style="">
                                <label>Salary Range (Disarankan)</label>
                            </td>
                            <td>
                                <table class="table" style="margin-bottom:0px;">
                                    <tr>
                                        <td style="padding:0px;">
                                            <?php echo form_input (input('min_gaji', 'min_gaji', '', 'form-control', ''), '', $readonly) ?>
                                        </td>
                                        <td style="padding:0px 10px;">-</td>
                                        <td style="padding:0px;">
                                            <?php echo form_input (input('max_gaji', 'max_gaji', '', 'form-control', ''), '', $readonly) ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <?php foreach($tunjangan as $t) : ?>
                                <div class="row" style="width:100%">
                                    <div class="col-sm-6">
                                        <table style="font-size:13px;">
                                            <tr>
                                                <td>
                                                    <?php echo form_checkbox (checkbox("tunjangan[".$t->id_tunjangan."]" , '', $t->jumlah_tunjangan, 'form-control tunjangan'),'','',array('onclick' => 'hitungTotalGaji()')) ?>
                                                </td>
                                                <td><label><?php echo $t->nama_tunjangan ?></label></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo form_input (input(strtolower(str_replace(' ', '_', $t->nama_tunjangan)), '', $t->jumlah_tunjangan , 'form-control', ''), '', $readonly) ?>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <div class="row" style="width:100%">
                                    <div class="col-sm-6">
                                        <table style="font-size:13px;">
                                            <tr>
                                                <td>
                                                    
                                                </td>
                                                <td><label>Total Gaji</label></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo form_input (input('gaji_total', 'gaji_total', '0' , 'form-control', ''), '', $readonly) ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo form_submit('save', 'Simpan',array("class" => "btn btn-success")); ?></td>
                            <td><?php echo form_button('batal', 'Batal',array("class" => "btn btn-danger")); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    function salaryRange(jabatan) {

        var idjabatan = $(jabatan).val();
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url().'index.php/pegawai/salaryRange/' ?>" + idjabatan,
            success: function(response) {
                console.log(response);
                $("#min_gaji").val(response.min_salary);
                $("#max_gaji").val(response.max_salary);
            }
        });

    }
    
    function hitungTotalGaji(){
        var tunjangan = $('.tunjangan');
        var gajipokok = $('#gaji_pokok').val();
        
        if(gajipokok == ""){
            gajipokok = 0;
        }
        
        gajitotal = parseInt(gajipokok);
        console.log(gajitotal);
        ;
        $.each( tunjangan, function( key, tunjang ) {
            
            if($(tunjangan[key]).is(':checked')){
                console.log(tunjang.value);
                gajitotal = parseInt(gajitotal) + parseInt(tunjang.value);
            }
        });
        $('#gaji_total').val(gajitotal)
    }
    /*
        $("#statusmenikah").on("change", function() {
            var statusmenikah = $('#statusmenikah option:selected').val();

            if (statusmenikah == "belum menikah") {
                $("#jumlahanak").val("0");
                $("#jumlahanak").attr("readonly", "readonly");
            } else {
                $("#jumlahanak").removeAttr("readonly");
            }
        });
        */

</script>
