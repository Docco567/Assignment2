<?php
require_once ("../author/php/component.php");
require_once ("../author/php/operation.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author</title>


    <script src="https://kit.fontawesome.com/0705b3137d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Custom StyleSheet -->
    <link rel="stylesheet" href='style2.css'
</head>
<body>

<main>
    <div class ="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa-book"></i>Authors</h1>

     <div class="d-flex justify-content-center">
         <form action="" method="post" class="w-50">
          <div class="pt-2">
              <?php inputElement("<i class=\"fas fa-book\"></i>","Author ID","author_id", setID());?>
          </div>
          <div class="pt-2">
            <?php inputElement("<i class=\"fas fa-users\"></i>","Book Name","book_name","");?>
          </div>
             <div class="row pt-2">
                 <div class="col">
                     <?php inputElement("<i class=\"fas fa-heart\"></i>","Author Name","author_name","");?>
                 </div>
                 <div class="col">
                     <?php inputElement("<i class=\"fas fa-pound-sign\"></i>","Book Price","book_price","");?>
                 </div>
             </div>
             <div class="d-flex justify-content-center">
                 <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","dat-toggle='tooltip' data-placement='bottom' title='Create'");?>
                 <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","dat-toggle='tooltip' data-placement='bottom' title='Read'");?>
                 <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","dat-toggle='tooltip' data-placement='bottom' title='Update'");?>
                 <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","dat-toggle='tooltip' data-placement='bottom' title='Delete'");?>
                 <?php deleteBtn()?>
             </div>
         </form>
     </div>
        <!-- Bootstrap table -->
        <div class="d-flex table data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <?php

                    if(isset($_POST['read'])){
                        $result = getData();

                        if($result){

                          while($row = mysqli_fetch_assoc($result)){?>

                            <tr>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id'];?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name'];?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['author_name'];?></td>
                                <td data-id="<?php echo $row['id']; ?>"><?php echo '£'. $row['book_price'];?></td>
                                <td><i class= "fas fa-edit btnedit" data-id ="<?php echo $row['id']; ?>"></i></td>
                            </tr>

                              <?php

                          }
                        }
                    }

                    ?>
                </thead>
            <tbody id="tbody">
            <tr>

            </tr>
            </tbody>
            </table>
        </div>


    </div>
</main>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="../author/php/main.js"></script>
</body>
</html>