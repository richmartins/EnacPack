

$( document ).ready(function(){
  function getJsonVal() {
    $.getJSON( "assets/shellCom.json", function( data ) {
      var commands = data.command;
      $.each(commands, function( key, obj ) {
        if (obj.name == $("#selector").find(":selected").attr("value")){
          $('#applyButton').show();
          $('#delButton').show();
          $('#inputName').val(obj.name);
          $('#inputId').val(obj.id);
          $('#area').val(obj.shell);
        }else if($("#selector").find(":selected").attr("value") == "add"){
          $('#applyButton').hide();
          $('#delButton').hide();
          $('#inputName').val("")
          $('#inputId').val("");
          $('#area').val("")
        }
      })
    })
  }

  // Upload button
  $('#select_file').click(function () {
    $("input[type='file']").trigger('click');
  });

  $( '#applyButton').click(function(e){
    var name = $('#inputName').val();
    var id = $( '#inputId' ).val();
    var shell = $( '#area' ).val();
    console.log(name + "\r\n" +id + "\r\n" + shell);
    $.ajax({
      type: 'POST',
      url: 'adder.php',
      data: {name, id, shell, method:"applyButton"}, // or JSON.stringify ({name: 'jonas'}),
      success: function(html){
          alert('Applied with succes');
          location.reload();
      },
      error: function (){ alert('Failed to apply'); }
      //dataType: 'json'
    });
    e.preventDefault();
  });

  $( '#addButton').click(function(e){
    $.ajax({
      type: 'POST',
      url: 'adder.php',
      data: {method:"addButton"}, // or JSON.stringify ({name: 'jonas'}),
      success: function(html){
          alert('Applied with succes');
          location.reload();
      },
      error: function (){ alert('Failed to add'); },
      //dataType: 'json'
    });
    e.preventDefault();
  });

  $( '#delButton').click(function(e){
    $.ajax({
      type: 'POST',
      url: 'adder.php',
      data: {method:"delButton"}, // or JSON.stringify ({name: 'jonas'}),
      success: function(html){
          alert('Applied with succes');
          location.reload();
      },
      error: function (){ alert('Failed to delete'); },
      //dataType: 'json'
    });
    e.preventDefault();
  });

  $("#selector").change(function() {
    getJsonVal();
  })


  // Initialize the tooltip.
  $('#copy-button').tooltip();

    // When the copy button is clicked, select the value of the text box, attempt
    // to execute the copy command, and trigger event to update tooltip message
    // to indicate whether the text was successfully copied.
    $('#copy-button').bind('click', function() {
      var input = document.querySelector('#copy-input');
      input.setSelectionRange(0, input.value.length + 1);
      try {
        var success = document.execCommand('copy');
        if (success) {
          $('#copy-button').trigger('copied', ['Copied!']);
        } else {
          $('#copy-button').trigger('copied', ['Copy with Ctrl-c']);
        }
      } catch (err) {
        $('#copy-button').trigger('copied', ['Copy with Ctrl-c']);
      }
    });

    // Handler for updating the tooltip message.
    $('#copy-button').bind('copied', function(event, message) {
      $(this).attr('title', message)
          .tooltip('fixTitle')
          .tooltip('show')
          .attr('title', "Copy to Clipboard")
          .tooltip('fixTitle');
    });

    getJsonVal();

});
