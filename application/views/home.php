<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php  if (null !== $this->session->flashdata('error')): ?>
    <div class="custom_div_error">
        <span>⚠️<?= $this->session->flashdata('error') ?>⚠️</span>
    </div>
<?php endif;?>

<div id="home-container">
    <form class="home-form" method="GET" action="<?= base_url()?>process_input_home/">
        <div id="home-card-deck">
            <?php foreach ($applications as $app): ?>
                <label class="home-link-label">
                    <img class="home-card-img" alt="<?= $app->name ?> icon" src="<?= base_url()?>public/app-icons/<?= $app->name ?>.png">
                    <div class="home-card-content">
                        <span class="home-card-title" style="width: 100%;">
                            <?=$app->name?>
                        </span>
                        <span class="home-card-check-box">
                            <input type="checkbox" name="checked_app[]" value="<?= $app->name ?>" />
                        </span>
                    </div>
                </label>
            <?php endforeach; ?>
        </div>
        <input class="btn" type="submit" value="INSTALL"/>
    </form>
</div>
