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

  function apply() {
    $.getJSON("asset/shellCom.json", function ( data ) {
      var commands = data.command
      var id = $( '#inputId' ).val();
      var shell = $( '#area' ).val();

      $.each(commands, function( key, obj ) {
        if(obj.id == id ){
          $.ajax({
            type: 'POST',
            url: '/form/',
            data: shell, // or JSON.stringify ({name: 'jonas'}),
            success: function(data) { alert('data: ' + data); },
            contentType: "asset/shellCom.json",
            dataType: 'json'
          });
        }
      })

      console.log(id + "\n" + shell);

    })
  }

  $( "#apllyButton" ).click(function() {
    apply();
  });

  $("#selector").change(function() {
    getJsonVal();
  })

  getJsonVal();
});
