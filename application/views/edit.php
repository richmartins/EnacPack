<?php  if (null !== $this->session->flashdata('error')): ?>
    <div class="custom_div_error">
        <span>⚠️<?= $this->session->flashdata('error') ?>⚠️</span>
    </div>
<?php endif;?>
<div class="edit-container">
    <form action="<?= base_url() ?>auth/process_edit" method="post" enctype="multipart/form-data" >
        <table class="edit-table">
            <tr>
                <th>NAMES</th>
                <th>SCRIPTS</th>
                <th>IMAGES</th>
            </tr>
            <tr>
                <td> <?=$command->name?> </td>
                <td><textarea class="edit-scripts-area" rows="10" cols="100" name="script" style="margin-bottom: 30px;  resize: vertical;" ><?= $command->shell ?></textarea></td>
                <td><input class="btn btn-danger custbtn" id="input_file" type="file" name="img"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <input type="submit" class="settings-btn" href="<?= base_url() ?>" value="APPLY">
                    <a class="settings-btn" href="<?= base_url() ?>auth">CANCEL</a>
                </td>
            </tr>
        </form>
    </table>
</div>