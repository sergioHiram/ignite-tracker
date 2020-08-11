
$(document).ready(function(){
  $("#menuDashboard").addClass("active")
  $.ajax({
    type: "POST",
    url: "functions/dashboard/validate.php",
    success: function(response){

      if (response == "success") {
        $("#mainBodyApp").show()
        $("#mainBodyApp").addClass("animate__animated animate__backInDown")
        $.ajax({
          type: "POST",
          url: "functions/dashboard/userName.php",
          success: function(data){
            $("#userName").html(data)
          }
        })
        // $.ajax({
        //   type: "POST",
        //   url: "pages/Dashboard.php",
        //   success: function(data){
        //     $("#mainContent").html(data)
        //     $("#pageNameHeader").html("Dashboard")
        //   }
        // })

        $.ajax({
          type: "POST",
          url: "pages/Config.php",
          success: function(data){
            $("#mainContent").html(data)
            $("#pageNameHeader").html("Configuration")
          }
        })

      }else if (response == "fail") {
        window.location.replace("../")
      }
    }
  })

})


$("#menuDashboard").click(function(){
  $(".nav-link").removeClass("active")
  $("#menuDashboard").addClass("active")
  $.ajax({
    type: "POST",
    url: "pages/Dashboard.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Dashboard")
    }
  })
})

$("#menuTracking").click(function(){
  $(".nav-link").removeClass("active")
  $("#menuTracking").addClass("active")
  $.ajax({
    type: "POST",
    url: "pages/Tracking.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Tracking")
    }
  })
})

$(".menuMyProfile").click(function(){
  $(".nav-link").removeClass("active")
  $(".menuMyProfile").addClass("active")
  $.ajax({
    type: "POST",
    url: "pages/Profile.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Profile")
    }
  })
})

$("#menuReports").click(function(){
  $(".nav-link").removeClass("active")
  $("#menuReports").addClass("active")
  $.ajax({
    type: "POST",
    url: "pages/Reports.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Reports")
    }
  })
})

$("#menuConfig").click(function(){
  $(".nav-link").removeClass("active")
  $("#menuConfig").addClass("active")
  $.ajax({
    type: "POST",
    url: "pages/Config.php",
    success: function(data){
      $("#mainContent").html(data)
      $("#pageNameHeader").html("Configuration")
    }
  })
})
