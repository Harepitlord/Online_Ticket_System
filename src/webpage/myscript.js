// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//This section for the signup section

function formData(x=0) {
  if(x == 0) {
    var obj = {
      'name':[document.getElementById('uname')],
      'users':[{
        'Uname':document.getElementById('uname'),
        'Email':document.getElementById('email'),
        'Password':document.getElementById('psw')
      }]
    }
    return obj;
  }
  else {
    var obj = {
      'Uname':document.getElementById('uname'),
      'Email':document.getElementById('email'),
      'Password':document.getElementById('psw')
    }
    return obj;
  }
}
function dataAdd() {
  alert('function call');
  var filedata = localStorage.getItem('userdata');
  if (filedata==null) {
    var obj=formData();
    var jsonData = JSON.stringify(obj);
    localStorage.setItem('userdata',jsonData);
  }
  else {
    var obj = formData(1);
    var data = JSON.parse(filedata);
    data['name'].push(obj['Uname']);
    data['users'].push(obj);
    var jsonData = JSON.stringify(data);
    localStorage.setItem('userdata',jsonData);
  }
  alert('Data added');
  window.location.href='chktrain.html';
}
