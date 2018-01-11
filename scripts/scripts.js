function change() {
  var location = this.options[this.selectedIndex].value
  document.getElementById("adderForm").submit(location);
}

$(document).ready(function (){
  var myjson = $.getJSON( "./asset/shellCom.json", function( command ) {
    console.log( "success" );
  })
  .done(function() {
  console.log( "second success" );
  })
  .fail(function() {
  console.log( "error" );
  })
  .always(function() {
  console.log( "complete" );
  });

  $('#selector option').each( function() {
    if($(this).is(':selected')) {
      console.log($(this).is(':selected').value);
      alert('selected');
    }
  })
});
