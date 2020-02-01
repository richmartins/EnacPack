<?php # if (null !== $this->session->flashdata('error')): ?>
    <div class="custom_div_error">
        <span>⚠️<?php #$this->session->flashdata('error') ?>⚠️</span>
    </div>
<?php #endif;?>
<div class="settings-container">
    <table class="settings-table">
        <tr>
            <th>NAMES</th>
            <th>SCRIPTS</th>
            <th>IMAGES</th>
            <th>OPTIONS</th>
        </tr>
        <?php foreach ($commands as $index => $command): ?>
            <tr>
                <td> <?=$command->name?> </td>
                <td><textarea class="settings-scripts-area" rows="10" cols="100" style="margin-bottom: 30px;  resize: none;" readonly ><?= $command->shell ?></textarea></td>
                <td><img src="<?= base_url() ?>public/app-icons/<?= $command->name?>.png" alt="<?= $command->name ?>" height="75px" width="75px"/></td>
                <td>
                    <a class="btn-settings" href="<?= base_url() ?>auth/?name=<?= $command->name ?>&id=<?= $index ?>&delete=0">EDIT</a>
                    <a class="btn-settings" href="<?= base_url() ?>auth/?name=<?= $command->name ?>&id=<?= $index ?>&delete=1">DELETE</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>