$( document ).ready(function(){
  function getJsonVal() {
    $.getJSON( "assets/shellCom.json", function( data ) {
      var commands = data.command;
      $.each(commands, function( key, obj ) {
        if (obj.name == $("#selector").find(":selected").attr("value")){
          $('#applyButton').show();
          $('#delButton').show();
          $('#addButton').hide();
          $('#inputName').val(obj.name);
          $('#inputId').val(obj.id);
          $('#area').val(obj.shell);
        }else if($("#selector").find(":selected").attr("value") == "add"){
          $('#applyButton').hide();
          $('#delButton').hide();
          $('#addButton').show();
          $('#inputName').val("")
          $('#inputId').val("");
          $('#area').val("")
          $('#select_file').attr("required");
        }
      })
    })
  }

  // Upload button
  $('#select_file').click(function () {
    $("input[type='file']").trigger('click');
    
  });


  $("#selector").change(function() {
    getJsonVal();

  })

    getJsonVal();

});
