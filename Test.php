<?php 
include 'Main.php';
$main = new Main();
$main->dump_data();

if(count($_POST) > 0)
{
    $data = $main->render_filter_data($_POST);
}
else
{
    $data = $main->render_cities();
}

// $min_birthRate = $_POST['minBirthrate'] && !empty($_POST['minBirthrate'])  ? $_POST['minBirthrate'] : 0;
// $max_birthrate = $_POST['maxBirthrate'] && !empty($_POST['maxBirthrate'])  ? $_POST['maxBirthrate'] : 0;
// $max_population = $_POST['maxPopulation'] && !empty($_POST['maxPopulation'])  ? $_POST['maxPopulation'] : 0;
// $min_population = $_POST['minPopulation'] && !empty($_POST['minPopulation'])  ? $_POST['minPopulation'] : 0; 
// $main->dump_data($min_population,$max_population,$min_birthRate,$max_birthrate);

?>

<!DOCTYPE html>
<html>
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
    </head>
    <body>
        
       <div class="container">
         <form action ="Test.php" method="post">
         <div class="row">
             <div class="col-3">
                  <div class="form-group">
                        <label for="min-birthrate">Min birthrate</label>
                        <input type="number" name="min-birthrate" class="form-control" id="min-birthrate">
                  </div>  
             </div>
             <div class="col-3">
                   <div class="form-group">
                        <label for="max-birthrate">Max birthrate</label>
                        <input type="number" name="max-birthrate" class="form-control" id="max-birthrate">
                  </div>  
             </div>
         </div>
         <div class="row">
             <div class="col-3">
                 <div class="form-group">
                        <label for="min-population">Max Population</label>
                        <input type="number" name="min-population" class="form-control" id="min-population">
                  </div>
             </div>
            
            <div class="col-3">
                 <div class="form-group">
                        <label for="max-population">Max Population</label>
                        <input type="number" name="max-population" class="form-control" id="max-population">
                  </div> 
             </div>
         </div>
         <div class="row">
             <div class="col-3">
                 <div class="form-group">
                        <label for="height">height</label>
                        <input type="number" name="height" class="form-control" id="height">
                  </div>
             </div>
            
            <div class="col-3">
                <div class="form-group">
                    <label for="sel1">height filter:</label>
                    <select name="height_filter" class="form-control" id="sel1">
                        <option></option>
                        <option>greater Than</option>
                        <option>less Than</option>
                    </select>
                </div>
             </div>
         </div> 
         <div class="row">
             <div class="col-3">
                 <div class="form-group">
                        <label for="area">Area</label>
                        <input type="number" name="area" class="form-control" id="area">
                  </div>
             </div>
            
            <div class="col-3">
                <div class="form-group">
                    <label for="sel2">area filter:</label>
                    <select name="area_filter" class="form-control" id="sel2">
                        <option></option>
                        <option>greater Than</option>
                        <option>less Than</option>
                    </select>
                </div>
             </div>
         </div>    
         <div class="row">
             <button type="submit" class="btn btn-primary" id="submitbtn">Summit</button>
         </div>
        </form> 
        </div>
      
        
        
        
        
        
        
        
        
        <div id="container">
            <h1>Cities</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>City Name</th>
                        <th>population</th>
                        <th>birth</th>
                        <th>height</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data)>0){ ?>
                    <?php foreach ($data as $data){ ?>
                        <tr>
                            <td><?php echo htmlspecialchars($data['cityName']); ?></td>
                            <td><?php echo htmlspecialchars($data['population']); ?></td>
                            <td><?php echo htmlspecialchars($data['birthsPerWomen']); ?></td>
                            <td><?php echo htmlspecialchars($data['height']); ?></td>
                            <td><?php echo htmlspecialchars($data['area']); ?></td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
    </body>
</div>
</html>


