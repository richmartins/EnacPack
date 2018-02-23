<?php

if ($_POST["method"]=="applyButton"){
  handleApply($_POST);
}

function handleApply($param) {
  error_log(var_export($param, true));
  echo "{resolve:success}";
}
