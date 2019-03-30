<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</header>
<body>
     <div class="container">
         <div class="row">
             <div class="col-3">
                  <div class="form-group">
                        <label for="min-birthrate">Min birthrate</label>
                        <input type="number" class="form-control" id="min-birthrate">
                  </div>  
             </div>
             <div class="col-3">
                   <div class="form-group">
                        <label for="max-birthrate">Max birthrate</label>
                        <input type="number" class="form-control" id="max-birthrate">
                  </div>  
             </div>
         </div>
         <div class="row">
             <div class="col-3">
                 <div class="form-group">
                        <label for="max-population">Max Population</label>
                        <input type="number" class="form-control" id="max-population">
                  </div> 
             </div>
             <div class="col-3">
                 <div class="form-group">
                        <label for="min-population">Max Population</label>
                        <input type="number" class="form-control" id="min-population">
                  </div>
             </div>
         </div>    
         <div class="row">
             <button type="button" class="btn btn-primary" id="submitbtn">Summit</button>
         </div>

         
        <div class="row" id="rowResult">

        </div>

     </div>    
    

   

</body>
<script>

      $( document ).ready(function() {
            $.ajax({
                url: "Test.php",
                type: "post", //request type,
                dataType: 'json',
                data: {minBirthrate: minBirthrate, maxBirthrate: maxBirthrate, maxPopulation: maxPopulation,minPopulation:minPopulation},
                success:function(result){
                    console.log(result.abc);
                }
                
            });  
      });  


       $('body').delegate('#submitbtn','click',function(){

            var minBirthrate = $('#min-birthrate').val();
            var maxBirthrate = $('#max-birthrate').val();
            var maxPopulation = $('#max-population').val();
            var minPopulation = $('#min-population').val();
           
            $.ajax({
                url: "Test.php",
                type: "post", //request type,
                dataType: 'json',
                data: {minBirthrate: minBirthrate, maxBirthrate: maxBirthrate, maxPopulation: maxPopulation,minPopulation:minPopulation},
                success:function(result){
                    console.log(result.abc);
                }
                // cache: false,
                // success: function(html){
                //     $("#results").append(html);
                // }
            });      
      }) 

</script>
</body>
</html>
