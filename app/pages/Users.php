

<div class="row justify-content-center animate__animated animate__bounceInLeft">
  <div class="col-10">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">Add user</h4>
        <form id="formSaveUser">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="Name" class="form-control" placeholder="Type name here">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" id="Email" class="form-control" placeholder="Type email here">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" id="Gender">
                  <option disabled selected>Select an option</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Role</label>
                <select class="form-control" id="Role">
                  <option disabled selected>Select an option</option>
                  <option value="0">Graduate</option>
                  <option value="1024">Administrator</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <button type="submit" id="addUser" class="btn btn-primary btn-lg">Save user</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center animate__animated animate__bounceInLeft">
  <div class="col-10">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">View users</h4>
        <div id="showTableUsers"><img src="assets/img/loader.gif" class="mx-auto d-block" alt=""></div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function(){
    $.ajax({
      type: "POST",
      url: "functions/users/show.php",
      success: function(data){
        $("#showTableUsers").html(data)
      }
    })
  })

  $("#addUser").click(function(){
    var Name = $("#Name").val()
    var Email = $("#Email").val()
    var Gender = $("#Gender").val()
    var Role = $("#Role").val()

    if ((Name != "") && (Email != "") && (Gender != null) && (Role != null)) {
      $.ajax({
        type: "POST",
        url: "functions/users/save.php",
        data: {
          Name:Name,
          Email:Email,
          Gender:Gender,
          Role:Role
        },
        success: function(response){
          if (response == "success") {
            Swal.fire('Done!','User saved','success')
            $("#formSaveUser").trigger("reset")
            $.ajax({
              type: "POST",
              url: "functions/users/show.php",
              success: function(data){
                $("#showTableUsers").html(data)
              }
            })
          }else {
            alert(response)
          }
        }
      })
    }else {
      $("#formSaveUser").effect("shake")
    }
    return false
  })
</script>
