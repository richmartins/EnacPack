$(document).ready(function (){
  $.ajax({
    dataType: "json".
    url: "/asset/shellCom.json",
    data: "data",
    success:
  })

  $.getJSON("../asset/shellCom.json", function( data ) {
    console.log(data);
    var items = [];
    $.each( data, function(name, val) {
      items.push( "<div  id='" + name + "'>" + val "</div>");
    });
    $("</div>", {
      "class": "my-new-card",
      html: items.join("")
    }).appendTo("body");
  })
}
