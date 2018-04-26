function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");

  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied to\nclipboard!";
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
