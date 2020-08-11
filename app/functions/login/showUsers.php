<?php

require("../db.php");

$sql = "SELECT * FROM IU WHERE S = 1";
$result = query($sql);

echo '<div class="row justify-content-center">';

while ($row = fetch_array($result)) {
  $Id = $row['Id'];
  $Name = f_c($row['N'],'d');
  $Gender = $row['G'];
  $Photo = $row['Ph'];

  if ($Photo == "NA") {
    if ($Gender == 1) {
      $Path = "app/assets/img/boy.jpg";
    }elseif ($Gender == 2) {
      $Path = "app/assets/img/girl.jpg";
    }
  }else {
    $Path = "app/assets/img/$Id/$Photo";
  }

  echo '
    <div class="col-md-3 col-10" style="margin-top:15px;">
      <div class="card shadow hvr-grow" id="login_'.$Id.'">
        <div class="card-body">
          <img src="'.$Path.'" class="mx-auto d-block img-fluid" style="min-height:150px; max-height:150px;" alt="">
          <hr>
          <h4 style="text-align:center;">'.$Name.'</h4>
        </div>
      </div>
    </div>
  ';

  echo '
  <script type="text/javascript">
    $("#login_'.$Id.'").click(function(){
      $("#showUsers").hide()
      $.ajax({
        type: "POST",
        url: "app/functions/login/showPassword.php",
        data: {
          UserId:"'.$Id.'"
        },
        success: function(data){
          $("#askPassword").html(data)
          $("#askPassword").show()
          $("#askPassword").addClass("animate__animated animate__backInDown")
        }
      })
    })
  </script>
  ';

}

echo '</div>';
?>
