<?php

require("../db.php");

$sql = "SELECT * FROM G";
$result = query($sql);
$count = row_count($result);

if ($count != 0) {
  echo '
  <div class="table-responsive">
  <input class="form-control" id="groupsSearchInput" type="text" placeholder="Search..">
  <br>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Added by</th>
          <th>Added date</th>
        </tr>
      </thead>
      <tbody id="groupsTable">
  ';
  $i = 1;
  while ($row = fetch_array($result)) {
    $IdGroup = $row['IdG'];
    $GroupName = $row['N_G'];
    $AddedBy = f_c($row['AB_G'],'d');
    $AddedDate = $row['CD_G'];

    $sql1 = "SELECT * FROM IU WHERE Id = '{$AddedBy}'";
    $result1 = query($sql1);
    $row1 = fetch_array($result1);
    $AddedByName = f_c($row1['N'],'d');

    echo '
    <tr style="color:#FFF;cursor:pointer;" id="viewGroupOptions_'.$IdGroup.'">
      <td>'.$i.'</td>
      <td>'.$GroupName.'</td>
      <td>'.$AddedByName.'</td>
      <td>'.$AddedDate.'</td>
    </tr>
    ';
    echo '
    <script type="text/javascript">
      $("#viewGroupOptions_'.$IdGroup.'").click(function(){
        $.ajax({
          type: "POST",
          url: "pages/GroupDetails.php",
          data: {
            IdGroup:"'.$IdGroup.'"
          },
          success: function(data){
            $("#mainContent").html(data)
            $("#pageNameHeader").html("Details of group: '.$GroupName.'")
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
  $("#groupsSearchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#groupsTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>
