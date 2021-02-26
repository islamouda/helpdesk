<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.css') }}"> -->


<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-5" >
  <form method="post" action="{{ route('replacement.create') }}" >
          @csrf 
  <div class="row">
    <div class="col-8">

  
 
  <!-- Content here -->


<!-- Parts begins -->
  <div class="form-group"> 
    <div class="form-check">
    <ul class="checkbox-grid">
  @foreach ($parts as $part)
    <li>
      <input class="form-check-input is-valid" type="checkbox" name="part_id[]" value="{{ $part->id }} ">
      <label class="form-check-label" for="invalidCheck3" style="margin-right: 5rem;" >
            {{ $part->part }}
      </label>
    </li>
    @endforeach
    </ul>
    </div>
  </div>
<!-- Parts ends --> 

<!-- S_N begins -->
<div class="form-group">
    <label for="formGroupExampleInput">Machien model</label>
    <input type="text" name="sn" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
  </div>
<!-- S_N ends --> 

<!-- Date Of Issue begins -->
  <div class="bootstrap-iso">

  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">    
    <form >
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date Of Issue</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
     </form>
    </div>
  </div>    

</div>
<!-- Date Of Issue ends --> 


<!-- description begins -->
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="description_user" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
<!-- description ends -->


<!-- did this issue begins -->
<div class="form-group">
    <label for="exampleFormControlTextarea1">Did This Issue Happened Before  : </label> <br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="issue" id="inlineRadio1" value="0">
  <label class="form-check-label" for="inlineRadio1">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="issue" id="inlineRadio2" value="1">
  <label class="form-check-label" for="inlineRadio2">No</label>
</div>
</div>

<!-- did this issue ends -->

<!-- email manager begins  -->
<div class="row">
    <div class="col">
    <label for="exampleFormControlTextarea1">Manager</label>
        <div class="input-group mb-3">

            <select name="manager_id" class="custom-select is-valid" id="inputGroupSelect01" required>
            <option disabled selected>Choose...</option>
            @foreach ($managers as $manager)
            <option value="{{ $manager->id }}">{{ $manager->manager }}</option>
            @endforeach
            </select>
        </div>
    </div>
</div>

<!-- email manager ends  -->
<div class="form-group">
<button type="submit" class="btn btn-primary">Save changes</button> 
</div>



</div>




  </div>
  </form>
</div>

<script type="text/javascript">
$('#datetimepicker').data("DateTimePicker").FUNCTION()
            $(function () {
                $('#datetimepicker4').datetimepicker();
            });
        </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->


<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-dd-mm',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>


    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->


  </body>
</html>