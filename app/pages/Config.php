

<div class="row justify-content-center animate__animated animate__backInLeft">
  <div class="col-md-4 col-6">
    <div class="card shadow hvr-grow" id="manageUsersBtn">
      <div class="card-body" style="color:#FFF;">
        <div class="row justify-content-center">
          <i class="fas fa-user-friends fa-4x"></i>
        </div>
        <div class="row justify-content-center">
          <h4 style="text-align:center;">Manage users</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-6">
    <div class="card shadow hvr-grow" id="manageGroupsBtn">
      <div class="card-body" style="color:#FFF;">
        <div class="row justify-content-center">
          <i class="fas fa-users fa-4x"></i>
        </div>
        <div class="row justify-content-center">
          <h4 style="text-align:center;">Manage groups</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-6">
    <div class="card shadow hvr-grow" id="manageWeeksBtn">
      <div class="card-body" style="color:#FFF;">
        <div class="row justify-content-center">
          <i class="far fa-calendar-alt fa-4x"></i>
        </div>
        <div class="row justify-content-center">
          <h4 style="text-align:center;">Manage weeks</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-6">
    <div class="card shadow hvr-grow" id="manageTypeOfTrainingBtn">
      <div class="card-body" style="color:#FFF;">
        <div class="row justify-content-center">
          <i class="fas fa-code-branch fa-4x"></i>
        </div>
        <div class="row justify-content-center">
          <h4 style="text-align:center;">Manage type of training</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-6">
    <div class="card shadow hvr-grow" id="manageTrainingsBtn">
      <div class="card-body" style="color:#FFF;">
        <div class="row justify-content-center">
          <i class="fas fa-rocket fa-4x"></i>
        </div>
        <div class="row justify-content-center">
          <h4 style="text-align:center;">Manage trainings</h4>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$("#manageUsersBtn").click(function(){
  $.ajax({
    type: "POST",
    url: "pages/Users.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Manage Users")
    }
  })
})

$("#manageGroupsBtn").click(function(){
  $.ajax({
    type: "POST",
    url: "pages/Groups.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Manage Groups")
    }
  })
})

$("#manageWeeksBtn").click(function(){
  $.ajax({
    type: "POST",
    url: "pages/Weeks.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Manage Weeks")
    }
  })
})

$("#manageTypeOfTrainingBtn").click(function(){
  $.ajax({
    type: "POST",
    url: "pages/TypeOfTraining.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Manage Type of Training")
    }
  })
})

$("#manageTrainingsBtn").click(function(){
  $.ajax({
    type: "POST",
    url: "pages/Trainings.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Manage Trainings")
    }
  })
})

</script>
