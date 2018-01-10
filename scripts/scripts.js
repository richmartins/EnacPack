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

$(document).ready(function (){
  $('#selector option').each( function() {
    if($(this).is(':selected')) {

      alert('selected');
    }
  })
});
