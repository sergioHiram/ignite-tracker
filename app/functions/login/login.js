
$(document).ready(function(){
  $.ajax({
    type: "POST",
    url: "app/functions/login/showUsers.php",
    success: function(data){
      $("#showUsers").html(data)
    }
  })
})
