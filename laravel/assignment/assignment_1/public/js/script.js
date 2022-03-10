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
  if (objectStudent) {
    $.ajax({
      url: "http://127.0.0.1:8000/api/student",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify(objectStudent),
      success: function (res) {
        alert("Student Added");
        window.location.reload();
        clear();
      },
    });
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
    success: function (result) {
      getStudentData();
    },
  })
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
  console.log(objectStudent);
  $.ajax({
    url: "http://127.0.0.1:8000/api/student/" + id,
    type: "PUT",
    dataType: "json",
    contentType: "application/json",
    data: JSON.stringify(objectStudent),
    success: function (result) {
      alert("Student Updated");
      window.location.reload();
      clear();
    },
  })
}

