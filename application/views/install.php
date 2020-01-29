<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="install-container-url">
    <input type="text" id="install-url" value="<?= $url ?>"/>
    <span>copy</span>
</div>
<div id="instruct">
    <div id="step1" class="instruct-step">
        <h3>Step 1</h3>
        <p>
            Open the " Spotlight Search " by typing : [CMD]+[SPACE]
        </p>
        <img  src="<?= base_url() ?>public/instructions/1.png" alt="step1"/>
    </div>
    <div id="step2" class="instruct-step">
        <h3>Step 2</h3>
        <p>
            Now open your terminal by typing : terminal + [ENTER]
        </p>
        <img src="<?= base_url() ?>public/instructions/2.png" alt="step2"/>
    </div>
    <div id="step3" class="instruct-step">
        <h3>Step 3</h3>
        <p>
            And finaly just past what you copied above and enjoy !
        </p>
        <img src="<?= base_url() ?>public/instructions/3.png" alt="step3"/>
    </div>
</div>