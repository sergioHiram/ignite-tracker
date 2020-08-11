<?php

require("../db.php");

$IdGroup = $_POST['IdGroup'];

$sql = "SELECT * FROM IU WHERE Gr != '{$IdGroup}'";
$result = query($sql);
$count = row_count($result);

if ($count != 0) {
  echo '
  <div class="table-responsive">
  <input class="form-control" id="usersNotInGroupSearchInput" type="text" placeholder="Search..">
  <br>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Status</th>
          <th>Name</th>
          <th>Current group</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody id="usersNotInGroupTable">
  ';
  $i = 1;
  while ($row = fetch_array($result)) {
    $Id = $row['Id'];
    $Name = f_c($row['N'],'d');
    $Role = $row['R'];
    $Status = $row['S'];
    $Group = $row['Gr'];

    if ($Status == 1) {
      $StatusIcon = '<i class="fas fa-user-check" style="color:green;"></i> Active';
    }elseif ($Status == 0) {
      $StatusIcon = '<i class="fas fa-user-times" style="color:yellow;"></i> Innactive';
    }

    if ($Group == 0) {
      $GroupName1 = "No group";
    }else{
      $sql1 = "SELECT * FROM G WHERE IdG = '{$Group}'";
      $result1 = query($sql1);
      $row1 = fetch_array($result1);
      $GroupName1 = $row1['N_G'];
    }

    if ($Role == 0) {
      $Role = "User";
    }elseif ($Role == 1024) {
      $Role = "Administrator";
    }

    echo '
    <tr style="color:#FFF;cursor:pointer;" id="usersNotInGroupRow_'.$Id.'">
      <td>'.$i.'</td>
      <td style="text-align:center;">'.$StatusIcon.'</td>
      <td>'.$Name.'</td>
      <td>'.$GroupName1.'</td>
      <td>'.$Role.'</td>
    </tr>
    ';

    echo '
    <script type="text/javascript">

    $("#usersNotInGroupRow_'.$Id.'").click(function(){
      $.ajax({
        type: "POST",
        url: "functions/groups/addUser.php",
        data: {
          UserId:"'.$Id.'",
          IdGroup:"'.$IdGroup.'"
        },
        success: function(response){
          if (response == "success") {
            $.ajax({
              type: "POST",
              url: "functions/groups/listUsersNot.php",
              data:{
                IdGroup:"'.$IdGroup.'"
              },
              success: function(data){
                $("#usersAvailableForGroup").html(data)
              }
            })

            $.ajax({
              type: "POST",
              url: "functions/groups/listUsersYes.php",
              data:{
                IdGroup:"'.$IdGroup.'"
              },
              success: function(data){
                $("#usersAlreadyInGroup").html(data)
              }
            })
          }else {
            alert(response)
          }
        }
      })
    })
    </script>
    ';

    $i++;
  }

  echo '
      </tbody>
    </table>
  </div>
  ';
}else {
  echo '
    <div class="jumbotron">
      <h3 style="text-align:center;">No data</h3>
    </div>
  ';
}

?>


<script>
$(document).ready(function(){
  $("#usersNotInGroupSearchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usersNotInGroupTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
