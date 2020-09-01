
<?php
$con=new mysqli('localhost','root','virat@18','alumni');

  // code...
  ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- includedlater  -->
    <script src="js/jquery.js"></script>
    <title>Find alum</title>
</head>

 <style>
body{
  background-color: grey;
}
    #topheader{
        background-color:rgb(221, 248, 239);
        border-bottom:1px solid rgb(217, 221, 221);
        text-decoration: none;
        position:relative;

    }
    .bottomheader .container-fluid{
        padding:0;
    }
    .mr-5{
        position:absolute;
        right:0px;
    }
    .txt-dsn a{
        text-decoration: none;
        color:rgb(53, 52, 52);
    }
    .filter-section {

    }
     .display-section{
        border-left:5px solid greenyellow;
        border-radius: 10%;
     }
     .product{
         background-color: darkblue;
         height:200px;
     }
     .product1{
         background-color: chocolate;
         height:200px;
        }
</style>

<body>
    <header>
        <div class="p-1" id="topheader">
        <div class="container">
            <div class="row">
                <div class="col-12  txt-dsn">
                        <a class="pr-2 " href=""><i>6005509654</i></a>
                        <a class="pl-2 " href=""><i>abc@gmail.com</i></a>
                        <a class="mr-5 pr-2" href=""><i>Admin</i></a>
                </div>
            </div>
        </div>
       </div>
       <div class="bottomheader">
           <div class="container-fluid ">
               <nav class="navbar navbar-expand-md navbar-light bg-light">
                   <a class="navbar-brand"><img src="" alt="img not found"></a>

                   <button class="navbar-toggler"type="" data-toggle="collapse" data-target="#mylist">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse " id="mylist">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                         <a href="" class="nav-link">Filter</a>
                     </li>
                     <li class="nav-item">
                         <a href="" class="nav-link">join now</a>
                     </li>
                    </ul>
                   </div>
                </nav>
           </div>
       </div>
    </header>
    <div class="container-fluid pt-md-5">
        <div class="row">
            <div class="col-md-3 filter-section">
                <div class="list-group">
                    <div class="list-group-item checkbox">
                        <h5>Department</h5>
                        <?php
                        $query="SELECT DISTINCT(department) FROM `member`ORDER BY department";
                      $result=mysqli_query($con,$query);
                      $row=array();
                        while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                        <label>  
                            <input type="checkbox" class="common_selector filter_all department" value="<?php echo $row['department']; ?>">
                            <?php echo $row['department']; ?>
                        </label><br>
                      <?php } ?>
                    </div>
                </div>
                <!--batch-->
                <div class="list-group pt-md-2">
                    <div class="list-group-item checkbox ">
                        <h5>Batch</h5>
                        <?php
                        $query="SELECT DISTINCT(batch) FROM `member`ORDER BY batch";
                      $result=mysqli_query($con,$query);
                      $row=array();
                        while($row=mysqli_fetch_assoc($result))
                          {
                          ?>
                        <label>
                            <input type="checkbox" class="common_selector filter_all batch" value="<?php echo $row['batch'] ?>">
                              <?php echo $row['batch'] ?>
                        </label><br>
                          <?php } ?>

                    </div>
                </div>

                <div class="list-group pt-md-2">
                  <div class="list-group-item checkbox">
                    <h5>Company</h5>
                    <hr>
                    <?php
                    $query="SELECT DISTINCT(company) FROM `member`ORDER BY company ";
                    $result=mysqli_query($con,$query);
                    $row=array();
                    while($row=mysqli_fetch_assoc($result)){
                     ?>
                    <label>
                      <input type="checkbox" class="common_selector filter_all company" value="<?php echo $row['company'] ?>">
                        <?php echo $row['company'] ?>
                    </label><br>
                  <?php } ?>
                  </div>
                </div>
            </div>
        <div class="col-md-9 ">
          <div class="row display-section">
              <div class="col-sm-6 col-lg-4" >
                  <div class="card">
                      <img class="img-fluid rounded" src="abt2.jpg" alt="">
                  </div>
              </div>
              <div class="col-sm-6 col-lg-4" >
                <div class="card">
                    <img class="img-fluid " src="abt2.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card">
                    <img class="img-fluid " src="abt2.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4" >
                <div class="card text-center">
                    <img class="img-fluid " src="abt2.jpg" alt="">
                    <h5>Kay Smith</h5>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
<script>
$(document).ready(function(){
    filter_data();
    function filter_data(){
        department=get_filter('department');
        batch=get_filter('batch');
        company=get_filter('company');
        $.ajax({
            type:"POST",
            url:"fprocess.php",
            
            data:{department:department , batch:batch ,company:company},
            success:function(data){
                $('.display-section').html(data);
            }
        });
    }
    function get_filter(class_name){
        var filter=[];
        $('.'+class_name+':checked' ).each(function(){
            filter.push($(this).val()); 
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>


</body>
</html>
<style>
    .card{
         margin-bottom: 20px;
    padding: 30px 15px;
    background: #fff;
    background: rgba(255,255,255,0.9);
    }

</style>
