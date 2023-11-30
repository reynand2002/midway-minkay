<form class="form-horizontal well span6" action="controller.php?action=add" method="POST" onsubmit="return validateForm()">

  <fieldset>
    <legend>New Accommodation</legend>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accommodation_name">Name:</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="accommodation_name" name="accommodation_name" placeholder="Accommodation" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accommodation_description">Description:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="accommodation_description" name="accommodation_description" placeholder="Description" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>

        <div class="col-md-8">
          <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>
      </div>
    </div>

  </fieldset>
</form>

<script>
  function validateForm() {
    var name = document.getElementById("accommodation_name").value;
    var description = document.getElementById("accommodation_description").value;

    if (name === "" || description === "") {
      alert("Please fill out all fields.");
      return false;
    }

    return true;
  }
</script>


</div><!--End of container-->