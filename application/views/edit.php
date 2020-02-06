<?php
    if(isset($_GET['error'])){
        echo $_GET['error'];
    }
?>
<div class="edit-container">
    <form action="<?= base_url() ?>auth/process_edit" method="post" enctype="multipart/form-data" >
        <div class="edit-form-container">
            <div class="edit-form">
                
                <div id="edit-form-col-script"class="edit-form-col">
                    <span class="edit-form-header-text">SCRIPTS</span>
                    <textarea class="edit-scripts-area" rows="20" cols="55" name="script" style="resize: vertical;" ><?= $command->shell ?></textarea>
                </div>
                <div class="edit-form-col">
                    <span class="edit-form-header-text">IMAGES</span>
                    <img src="<?= base_url() ?>public/app-icons/<?= $command->name ?>.png " alt="<?= $command->name ?>" style="width: 8em; height: 8em; align-self: center;"/>
                    <label for="img">Click below to choose new image file to upload<br />Note that the image must be a <b>PNG</b> file and should have be <b>170px</b> by <b>170px</b></label>
                    <input class="edit-form-upload-btn" id="input_file" type="file" name="img">
                </div>
                <input type="hidden" name="name" value="<?=$command->name?>"/>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
            </div>
            <div class="edit-container-btns">
                <input type="submit" class="edit-btn" href="<?= base_url() ?>" value="APPLY">
                <a class="edit-btn" href="<?= base_url() ?>auth">CANCEL</a>
            </div>
        </div>
    </form>
</div>