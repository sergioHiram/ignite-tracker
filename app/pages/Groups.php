

<div class="row justify-content-center animate__animated animate__bounceInLeft">
  <div class="col-5">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">Add group</h4>
        <form id="addGroupForm">
          <div class="form-group">
            <label for="">Group name</label>
            <input type="text" id="groupName" class="form-control" placeholder="Type group name">
          </div>
          <div class="row justify-content-center">
            <button type="submit" id="saveGroup" class="btn btn-primary">Save group</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-7">
    <div class="card shadow">
      <div class="card-body">
        <h4 class="titleCard">View groups</h4>
        <div id="showGroups"></div>
      </div>
    </div>
  </div>
</div>


<div class="row justify-content-center animate__animated animate__bounceInLeft">

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      type: "POST",
      url: "functions/groups/show.php",
      success: function(data){
        $("#showGroups").html(data)
      }
    })
  })

  $("#saveGroup").click(function(){
    $(this).attr('disabled', true);
    var groupName = $("#groupName").val()
    if (groupName != "") {
      $.ajax({
        type: "POST",
        url: "functions/groups/save.php",
        data: {
          groupName:groupName
        },
        success: function(response){
          if (response == "success") {
            $.ajax({
              type: "POST",
              url: "functions/groups/show.php",
              success: function(data){
                $("#showGroups").html(data)
              }
            })
            Swal.fire("Done!","Group was saved","success")
            $("#addGroupForm").trigger("reset")
          }else {
            alert(response)
          }
        }
      })
    }else {
      Swal.fire("Error!","Group name can't be blank","error")
    }
    $(this).attr('disabled', false);
    return false
  })
</script>
