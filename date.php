<!DOCTYPE html>
<html lang="en">
<head>
  <title>maribelajarcoding.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- framework bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- datepicker bootstrap -->
  <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>

  <script>
  $( function() {
    $( "#date" ).datepicker({
      autoclose:true,
      todayHighlight:true,
      format:'yyyy-mm-dd',
      language: 'id'
    });
  } );
  </script>
</head>
<body>

<div class="container">
 
  <form>
    <div class="form-group">
      <label  class="control-label col-sm-1" >Date:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="date">
      </div>      
    </div>
  </form>
</div>

</body>
</html>