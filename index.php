
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guarderia</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
       <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
 
    <link href="css/bootstrap-switch.css" rel="stylesheet">
  
<script src="js/bootstrap-switch.js"></script>



</head>

<body>

    <!-- Navigation -->
            <div class="col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-2 main">
              <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li class="active"><a href="#">Principal</a></li>
                    <li><a href="#">Informaci&oacute;n</a></li>
                    <li><a href="#">Contacto</a></li>
                    <?php  if (isset($_SESSION['usuario'])){
                    
                    // Mostrar un boton que nos lleve al panel. OJO
                           
                           }
                    ?>


                </ul>

                <h3 class="text-muted">Sistema de Gesti&oacute;n Guarderia</h3>
            </div>
            <hr>


        </div>







    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                
                
                <div class="jumbotron">
                        <h1>Guarderia</h1>
                        <p>Sistema de Gesti&oacute;n de guarderia infantil.</p>
                        
                    </div>
                
           

                <!-- Preview Image -->
                <img class="img-responsive" src="img/portada.jpg" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>

                
                <hr>

            </div>



            <?php




             if (!isset($_SESSION['usuario'])) {

                    if (isset($_POST['login'])) {

                        include 'login.php';

                        if (verificar_login($_POST['user'], $_POST['pass'], $result))  {
                            $_SESSION['usuario'] = $_POST['user'];
                            header("Location: main_panel.php?mode=main");
                            


                        } else {
                            echo '<script type="text/javascript">alert("mal")</script>';
                        }
                    }
                }

            ?>


            <div class="col-md-4">


                <div class="well">

                     <?php

                    if (!isset($_SESSION['usuario'])) {

                        echo '  
                            <form class="form-signin" role="form" action="index.php" method="POST">
                              <h2 class="form-signin-heading">Identicate</h2>
                              <input type="text" class="form-control" placeholder="Alias"  name="user" required autofocus>
                              <input type="password" class="form-control" placeholder="Password"  name="pass" required>
                              <hr>
                              <label>¿Recordar la proxima vez?  </label>
                              <input type="checkbox" name="my-checkbox" checked>
                              

                               <script type="text/javascript">$("[name=\'my-checkbox\']").bootstrapSwitch();</script>

                               <hr>
                              <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="login"  >Entrar</button>
                            </form>  ';
                    } else {


                        echo '<form class="form-signin" role="form" action="logout.php" method="POST">'
                        
                        . ' <button class="btn btn-lg   btn-block label-danger" type="submit" name="logout" value="logout"  >'
                        . '<span class="glyphicon glyphicon-off"></span> Log out'
                        . '</button>';
                        
                    }

        ?> 
                </div>


                <!-- Blog Categories Well -->
               

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Otras cosas</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
 

</body>

</html>
