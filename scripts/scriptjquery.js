$( document ).ready(function(){

  function getJsonVal() {
    $.getJSON( "assets/shellCom.json", function( data ) {
      var commands = data.command
      $.each(commands, function( key, obj ) {
        if (obj.name == $("#selector").find(":selected").attr("value")){
          $('#inputId').val(obj.id);
          $('#area').val(obj.shell);
        }
      })
    })
  }

  $( '#applyButton').click(function(e){
    console.log("Apply boutton pressed");
    var id = $( '#inputId' ).val();
    var shell = $( '#area' ).val();
    console.log(id + "\r\n" + shell);
    $.ajax({
      type: 'POST',
      url: 'api.php',
      data: {id, shell, method:"applyButton"}, // or JSON.stringify ({name: 'jonas'}),
      success: function(data) { alert('data: ' + data); },
      dataType: 'json'
    });
    e.preventDefault();
  });


  $("#selector").change(function() {
    getJsonVal();
  })

  getJsonVal();
});
