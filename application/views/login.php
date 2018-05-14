<div class="card bg-dark" style="width:700px; padding:50px 80px; margin:auto; margin-top:100px;">
    <form action="<?php echo base_url('index.php/pegawai/prosesLogin') ?>" method="post">
        <table class="table" style="color:white;">
            <tr>
                <td colspan="2" style="border:0px;">
                    <h3>Login</h3>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border:0px">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Username" name="username">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border:0px">
                    <input type="password" class="form-control" autocomplete="off" placeholder="Password" name="password">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="form-control btn btn-secondary" value="Login" name="login">
                </td>
            </tr>
        </table>
    </form>
</div>
