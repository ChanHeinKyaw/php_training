$(document).ready(function () {
  getStudentData();
})

//Get Student All Data
function getStudentData() {
  $.ajax({
    url: "http://127.0.0.1:8000/api/student",
    type: "GET",
    dataType: "json",
    contentType: "application/json",
    success: function (result) {
      if (result) {
        $("#studentList").html('');
        var row = "";
        for (var i = 0; i < result.length; i++) {
          row = row
            + "<tr>"
            + "<td>" + result[i].name + "</td>"
            + "<td>" + result[i].email + "</td>"
            + "<td>" + result[i].phone + "</td>"
            + "<td><button class='btn btn-primary btn-sm' onclick='edit_btn(" + result[i].id + ")'>Edit</button>&nbsp;<button class='btn btn-danger btn-sm' onclick='deleteStudentData(" + result[i].id + ")'>Delete</button></td>"
            + "</tr>";
        }
        if (row != "") {
          $("#studentList").append(row);
        }
      }
    }
  })
}

//Create Student Data
function createStudentData() {
  var objectStudent = {};
  objectStudent.name = $('.name').val();
  objectStudent.email = $('.email').val();
  objectStudent.phone = $('.phone').val();

  if (objectStudent.name == "") {
    document.getElementById("nameField").innerHTML = "Name Field Is Required";
  }

  if (objectStudent.email == "") {
    document.getElementById("emailField").innerHTML = "Email Field Is Required";
  }

  if (objectStudent.phone == "") {
    document.getElementById("phoneField").innerHTML = "Phone Field Is Required";
  }

  if (objectStudent.name != "" && objectStudent.email != "" && objectStudent.phone != "") {
    $.ajax({
      url: "http://127.0.0.1:8000/api/student",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify(objectStudent),
    });
    alert("Student Added");
    window.location.reload();
  }
}

function clear() {
  $('.name').val('');
  $('.email').val('');
  $('.phone').val('');
}

//Delete Student Data By ID
function deleteStudentData(id) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/student/" + id,
    type: "DELETE",
    dataType: "json",
    contentType: "application/json",
  })
  alert("Are You Sure You Want To Delete?");
  window.location.reload();

}


//Get Student Data By ID
function edit_btn(id) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/student/" + id,
    type: "GET",
    dataType: "json",
    contentType: "application/json",
    success: function (result) {
      $("#id").val(result.id);
      $("#name").val(result.name);
      $("#email_address").val(result.email);
      $("#phone").val(result.phone);
    },
  })
}


//Update Student Data By ID
function updateStudentData() {
  var id = $('.id').val();

  var objectStudent = {};
  objectStudent.name = $('.name').val();
  objectStudent.email = $('.email').val();
  objectStudent.phone = $('.phone').val();

  if (objectStudent.name == "") {
    document.getElementById("nameField").innerHTML = "Name Field Is Required";
  }

  if (objectStudent.email == "") {
    document.getElementById("emailField").innerHTML = "Email Field Is Required";
  }

  if (objectStudent.phone == "") {
    document.getElementById("phoneField").innerHTML = "Phone Field Is Required";
  }

  if (objectStudent.name != "" && objectStudent.email != "" && objectStudent.phone != "") {
    $.ajax({
      url: "http://127.0.0.1:8000/api/student/" + id,
      type: "PUT",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify(objectStudent),
    })
    alert("Student Uploaded");
    window.location.reload();
  }
}

