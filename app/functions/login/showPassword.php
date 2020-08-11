<?php

require("../db.php");

$UserId = $_POST['UserId'];
$sql = "SELECT * FROM IU WHERE Id = '{$UserId}'";
$result = query($sql);
$row = fetch_array($result);
$Name = f_c($row['N'],'d');
$Password = f_c($row['P'],'d');

if ($Password == "Temp") {

?>

<div class="row justify-content-center" id="formCreateNewPassword">
  <div class="col-10 col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 style="text-align:center;">Welcome <?php echo $Name; ?></h4>
        <h5 style="text-align:center;">Please create a password</h5>
        <hr>
        <form id="formPasswordLogin">
          <input type="password" id="Password1" class="form-control" placeholder="Type password">
          <br>
          <input type="password" id="Password2" class="form-control" placeholder="Re-type password">
          <br>
          <div class="row justify-content-center">
            <button type="submit" id="savePassword" class="btn btn-primary btn-lg">Create password</button>
          </div>
        </form>
        <br>
        <div class="row justify-content-center">
          <a href="index.html" style="text-align:center;">Not <?php echo $Name; ?>?</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#savePassword").click(function(){
    var Password1 = $("#Password1").val()
    var Password2 = $("#Password2").val()

    if ((Password1 != "") && (Password2 != "")) {
      if (Password1 == Password2) {
        $.ajax({
          type: "POST",
          url: "app/functions/login/saveFirstPassword.php",
          data: {
            UserId:"<?php echo $UserId ?>",
            Password:Password1
          },
          success: function(response){
            if (response == "success") {
              Swal.fire('Success!',"Password was saved, please login now",'success')
              $.ajax({
                type: "POST",
                url: "app/functions/login/showPassword.php",
                data: {
                  UserId:"<?php echo $UserId ?>"
                },
                success: function(data){
                  $("#askPassword").html(data)
                  $("#askPassword").show()
                  $("#askPassword").addClass("animate__animated animate__backInDown")
                }
              })
            }else{
              alert(response)
            }
          }
        })
      }else {
        Swal.fire('Error!',"Passwords did not match, please try again",'error')
      }
    }else {
      Swal.fire('Error!',"Both fields should be filled",'error')
    }
    return false
  })
</script>


<?php }else { ?>

<div class="row justify-content-center">
  <div class="col-10 col-md-6">
    <div class="card shadow">
      <div class="card-body">
        <h4 style="text-align:center;">Welcome <?php echo $Name; ?></h4>
        <hr>
        <form id="formPasswordLogin">
          <input type="password" id="Password" class="form-control" placeholder="Please type password">
          <br>
          <div class="row justify-content-center">
            <button type="submit" id="loginBtn" class="btn btn-primary btn-lg">Login</button>
          </div>
        </form>
        <br>
        <div class="row justify-content-center">
          <a href="index.html" style="text-align:center;">Not <?php echo $Name; ?>?</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#loginBtn").click(function(){
    var Password = $("#Password").val()

    if (Password != "") {
      $.ajax({
        type: "POST",
        url: "app/functions/login/login.php",
        data: {
          UserId:"<?php echo $UserId ?>",
          Password:Password
        },
        success: function(response){
          if (response == "success") {
            window.location.replace("app/")
          }else if (response == "fail") {
            Swal.fire('Error!',"Password is incorrect, please try again",'error')
          }else{
            alert(response)
          }
        }
      })
    }else {
      Swal.fire('Error!',"Password can't be blank",'error')
      $("#formPasswordLogin").effect("shake")
    }
    return false
  })
</script>

<?php } ?>
