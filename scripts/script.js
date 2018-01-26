var jsonfile = require('shellCom');

var file = '/asset/shellCom.json';
jsonfile.readFile(file, function(err, obj) {
  console.dir(obj)
})

function change(){
  document.getElementById("adderForm").submit();
}


function apply(){
  console.log('apply pressed');
}



function add(){

}
