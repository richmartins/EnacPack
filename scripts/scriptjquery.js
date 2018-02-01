$( document ).ready(function(){
  function getJsonVal() {
    $.getJSON( "asset/shellCom.json", function( data ) {
      var commands = data.command
      $.each(commands, function( key, obj ) {
        if (obj.name == $("#selector").find(":selected").attr("value")){
          $('#inputId').val(obj.id);
          $('#area').empty()
          $('#area').append(obj.shell);
        }
      })
    })
  }
  $("#selector").change(function() {
    getJsonVal();
  })
  getJsonVal();
});
