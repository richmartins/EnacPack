<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="install-container-url">
    <input type="text" id="install-url" value="curl -S <?= $url ?> | sh"/>
    <div class="tooltip" onclick="clipboard();" onmouseout="outFunc();">
        <span class="tooltiptext" id="tooltip">Copy to clipboard</span>
        copy
    </div>
</div>
<div id="instruct">
    <div id="step1" class="instruct-step">
        <h3>Step 1</h3>
        <p>
            Open the " Spotlight Search " by typing : [CMD]+[SPACE] or by clicking on the loop on the top right corner of your screen.
        </p>
        <img  src="<?= base_url() ?>public/instructions/1.png" alt="step1"/>
    </div>
    <div id="step2" class="instruct-step">
        <h3>Step 2</h3>
        <p>
            Now open your terminal by typing : terminal + the [ENTER] key
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
<script>
    function clipboard(){
        var clipboard = document.getElementById("install-url");
        clipboard.select();
        clipboard.setSelectionRange(0, 99999); /*For mobile devices*/

        document.execCommand("copy");

        var tooltip = document.getElementById("tooltip");
        tooltip.innerHTML = "Copied to\nclipboard!";
    }

    function outFunc() {
        var tooltip = document.getElementById("tooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
</script>