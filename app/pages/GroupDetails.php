<?php
require("../functions/db.php");
$IdGroup = $_POST['IdGroup'];
$sql = "SELECT * FROM G WHERE IdG = '{$IdGroup}'";
$result = query($sql);
$row = fetch_array($result);
$GroupName = $row['N_G'];
$AddedBy = f_c($row['AB_G'],'d');
$AddedDate = $row['CD_G'];
$Status = $row['S'];

$sql1 = "SELECT * FROM IU WHERE Id = '{$AddedBy}'";
$result1 = query($sql1);
$row1 = fetch_array($result1);
$AddedByName = f_c($row1['N'],'d');
?>


<div class="animate__animated animate__bounceInLeft">

  <div class="row">
    <div class="col-6">
      <h3><span class="badge badge-success">Group is active</span></h3>
    </div>
    <div class="col-6">
      <h5 style="text-align:right; cursor:pointer;" id="returnToGroups" class="hvr-grow"><i class="fas fa-arrow-left text-warning"></i> Return to Groups</h5>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <h5>Created by: <?php echo $AddedByName; ?></h5>
    </div>
    <div class="col-6">
      <h5 style="text-align:right;">Added: <?php echo $AddedDate; ?></h5>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="titleCard">Edit group</h4>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Group name" value="<?php echo $GroupName; ?>" id="groupNameEdit">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button" id="editGroupBtn">Edit</button>
              <button class="btn btn-warning" type="button" style="color:#FFF;" id="deactivateGroupBtn">Deactivate</button>
              <button class="btn btn-danger" type="button" id="deleteGroupBtn">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $("#editGroupBtn").click(function(){
    $.ajax({
      type: "POST",
      url: "functions/groups/editGroupName.php",
      data: {
        IdGroup:"<?php echo $IdGroup; ?>",
        groupNameEdit:$("#groupNameEdit").val()
      },
      success: function(response){
        if (response == "success") {
          $.ajax({
            type: "POST",
            url: "pages/GroupDetails.php",
            data: {
              IdGroup:"<?php echo $IdGroup; ?>",
            },
            success: function(data){
              $("#mainContent").html(data)
              $("#pageNameHeader").html("Details of group: <?php echo $GroupName ?>")
            }
          })
        }else {
          alert(response)
        }
      }
    })
  })
</script>

<div class="row">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">Users available</h4>
        <div id="usersAvailableForGroup"></div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">Users in this group</h4>
        <div id="usersAlreadyInGroup"></div>
      </div>
    </div>
  </div>
</div>

</div>


<script type="text/javascript">

  $(document).ready(function(){
    $.ajax({
      type: "POST",
      url: "functions/groups/listUsersNot.php",
      data:{
        IdGroup:"<?php echo $IdGroup; ?>"
      },
      success: function(data){
        $("#usersAvailableForGroup").html(data)
      }
    })

    $.ajax({
      type: "POST",
      url: "functions/groups/listUsersYes.php",
      data:{
        IdGroup:"<?php echo $IdGroup; ?>"
      },
      success: function(data){
        $("#usersAlreadyInGroup").html(data)
      }
    })
  })

  $("#returnToGroups").click(function(){
    $.ajax({
      type: "POST",
      url: "pages/Groups.php",
      success: function(data){
        $("#mainContent").html(data)
        $("#pageNameHeader").html("Manage Groups")
      }
    })
  })
</script>
