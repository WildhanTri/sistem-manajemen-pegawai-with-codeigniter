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
    function inputReadOnly($name, $id, $value, $class, $placeholder){
        $reg_input = array (
            'name' => $name,
            'id' => $id,
            'value' => $value,
            'class' => $class,
            'placeholder' => $placeholder,
            'autocomplete' => 'off',
            'readonly' => '',
        );
        
        return $reg_input;
    }
    $readonly = array('readonly' => 'true');
    foreach ($jabatan as $j) {
       $jabatans[$j->id_jabatan] = $j->nama_jabatan;
    }
?>

    <head>
        <title>Home Manajemen Pegawai</title>
        <?php $this->load->view('css'); ?>
        <?php $this->load->view('js'); ?>
    </head>

    <body>
        <?php $this->load->view('component/header') ?>

        <div class="container" style="padding-top:70px;">
            <h4>Tambah Pegawai</h4>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open ('pegawai/proses_tambah_pegawai'); ?>
                    <table class="table table-stripped" id="data">
                        <tr>
                            <td>
                                <label>ID Pegawai</label>
                            </td>
                            <td>
                                <?php echo form_input (input('idpegawai', '', $id, 'form-control', 'Masukkan Nama Pegawai...'), '', $readonly) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nama Pegawai</label>
                            </td>
                            <td>
                                <?php echo form_input (input('namapegawai', '', '', 'form-control', 'Masukkan Nama Pegawai...')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Jabatan</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('jabatanpegawai', $jabatans, '', array('class'=>'form-control')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Status Menikah</label>
                            </td>
                            <td>
                                <?php echo form_dropdown('statuspegawai', array("belum menikah" => "Belum Menikah", "menikah" => "Menikah"), '', array('class'=>'form-control')) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>
