$( document ).ready(function(){

  function getJsonVal() {
    $.getJSON( "assets/shellCom.json", function( data ) {
      var commands = data.command;
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


function validateForm() {
    var name =  document.getElementById('name').value;
    if (name == "") {
        document.getElementById('status').innerHTML = "Name cannot be empty";
        return false;
    }
    var email =  document.getElementById('email').value;
    if (email == "") {
        document.getElementById('status').innerHTML = "Email cannot be empty";
        return false;
    } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)){
            document.getElementById('status').innerHTML = "Email format invalid";
            return false;
        }
    }
    var subject =  document.getElementById('subject').value;
    if (subject == "") {
        document.getElementById('status').innerHTML = "Subject cannot be empty";
        return false;
    }
    var message =  document.getElementById('message').value;
    if (message == "") {
        document.getElementById('status').innerHTML = "Message cannot be empty";
        return false;
    }
    document.getElementById('status').innerHTML = "Sending...";
    document.getElementById('contact-form').submit();

}
