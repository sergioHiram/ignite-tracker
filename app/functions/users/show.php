<?php

require("../db.php");

$sql = "SELECT * FROM IU";
$result = query($sql);
$count = row_count($result);

if ($count != 0) {
  echo '
  <div class="table-responsive">
  <input class="form-control" id="usersSearchInput" type="text" placeholder="Search..">
  <br>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Status</th>
          <th>Name</th>
          <th>Email</th>
          <th>Last login</th>
          <th>Role</th>
          <th>Added by</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="usersTable">
  ';
  $i = 1;
  while ($row = fetch_array($result)) {
    $Id = $row['Id'];
    $Name = f_c($row['N'],'d');
    $Mail = f_c($row['M'],'d');
    $LastLogin = $row['LL'];
    $Role = $row['R'];
    $AddedBy = f_c($row['AB'],'d');
    $Status = $row['S'];

    $sql1 = "SELECT * FROM IU WHERE Id = '{$AddedBy}'";
    $result1 = query($sql1);
    $row1 = fetch_array($result1);
    $AddedByName = f_c($row1['N'],'d');

    if ($Status == 1) {
      $StatusIcon = '<i class="fas fa-user-check" style="color:green;"></i> Active';
      $optionsBtn = '<button type="button" id="deactivateUser_'.$Id.'" class="btn btn-warning btn-sm"><i class="fas fa-user-minus" style="color:#FFF;"></i></button>';
    }elseif ($Status == 0) {
      $StatusIcon = '<i class="fas fa-user-times" style="color:yellow;"></i> Innactive';
      $optionsBtn = '<button type="button" id="activateUser_'.$Id.'" class="btn btn-success btn-sm"><i class="fas fa-user-check" style="color:#FFF;"></i></button>
                     <button type="button" id="deleteUser_'.$Id.'" class="btn btn-danger btn-sm"><i class="fas fa-user-times" style="color:#FFF;"></i></button>';
    }

    if ($Role == 0) {
      $Role = "User";
    }elseif ($Role == 1024) {
      $Role = "Administrator";
    }

    echo '
    <tr style="color:#FFF;">
      <td>'.$i.'</td>
      <td style="text-align:center;">'.$StatusIcon.'</td>
      <td>'.$Name.'</td>
      <td>'.$Mail.'</td>
      <td>'.$LastLogin.'</td>
      <td>'.$Role.'</td>
      <td>'.$AddedByName.'</td>
      <td>'.$optionsBtn.'</td>
    </tr>
    ';
    echo '
    <script type="text/javascript">
      $("#deactivateUser_'.$Id.'").click(function(){
        Swal.fire({
          title: "Deactivate user",
          text: "Are you sure you want to do this?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, deactivate!"
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "POST",
              url: "functions/users/deactivate.php",
              data: {
                UserId:"'.$Id.'"
              },
              success: function(response){
                if (response == "success") {
                  Swal.fire("Done!","User has been deactivated","success")
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
          }
        })
      })

      $("#activateUser_'.$Id.'").click(function(){
        Swal.fire({
          title: "Activate user",
          text: "Are you sure you want to do this?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, ACTIVATE!"
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "POST",
              url: "functions/users/activate.php",
              data: {
                UserId:"'.$Id.'"
              },
              success: function(response){
                if (response == "success") {
                  Swal.fire("Done!","User has been activated","success")
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
          }
        })
      })

      $("#deleteUser_'.$Id.'").click(function(){
        Swal.fire({
          title: "Delete user",
          text: "Are you sure you want to do this?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, DELETE!"
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "POST",
              url: "functions/users/delete.php",
              data: {
                UserId:"'.$Id.'"
              },
              success: function(response){
                if (response == "success") {
                  Swal.fire("Done!","User has been deleted","success")
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
  $("#usersSearchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usersTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
