<?php
if (@session_start() == false) {
    session_start();
    if (!isset($_SESSION["userName"])) {
        header('location: ./login.php');
    }
} else {
    if (!isset($_SESSION["userName"])) {
        header('location: ./login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../Resources/Icons/FOTO AROMAS.jpg" type="image/x-icon">
        <title>Café Aromas</title>

        <!-- Bootstrap -->
        <link href="../StyleAdmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../StyleAdmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../StyleAdmin/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="../StyleAdmin/build/css/custom.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../js/ValidateFiledsAdmin.js" type="text/javascript"></script>
        
    </head>

    <body class="nav-md">
        <?php include './reusableMenu.php'; 
              include_once '../BusinessAdmin/AdministratorBusiness.php';
        ?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">                       

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Café Aromas<small></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>                                         
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="bs-docs-section">
                                    <h1 id="glyphicons" class="page-header">Registrar administrador</h1>
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">

                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Registar administrador</a>
                                            </li> 
                                            <li role="presentation" class="">
                                                <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Eliminar administrador</a>
                                            </li>                                                                                              
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                <form id="frmInformation" method="POST" action="../BusinessAdmin/AdministratorAction.php" enctype="multipart/form-data">
                                                    <ul style="list-style: none;">
                                                        <li><label>Nombre usuario:</label></li>
                                                        <li><input style="width: 70%; position: relative;" type="text" id="txtUserName" name="txtUserName"><label style="color: red;" id="txtErrorUserName"></label></li>
                                                        <li><label>Email:</label></li>
                                                        <li><input style="width: 70%; position: relative;" type="email" id="txtEmail" name="txtEmail"><label style="color: red;" id="txtErrorEmail"></label></li>                                                        
                                                        <li><label>Constraseña:</label></li>
                                                        <li><input style="width: 70%; position: relative;" type="password" id="password" name="txtPassword"><label style="color: red;" id="txtErrorPassword"></label></li><br>
                                                        <li><input type="submit" id="btnCreate" name="btncreate" value="Registrar" onclick="return validateNewFieldsAdministrator()" /></li>
                                                        <input type="hidden" id="create" name="create" value="create" />
                                                    </ul>
                                                </form>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                <ul>
                                                    <?php
                                                    $administratorB = new AdministratorBusiness();
                                                    $administrators = $administratorB->getAllTBuser();
                                                    $maxEs = sizeof($administrators);
                                                    for ($j = 0; $j < $maxEs; $j++) {
                                                        $currentAdmin = $administrators[$j];
                                                        ?>
                                                    <form id="frmDelete" method="POST" action="../BusinessAdmin/AdministratorAction.php" enctype="multipart/form-data">
                                                            <li><label style="width: 50%;"><?php echo $currentAdmin->getUserName(); ?></label>
                                                                <input type="submit" id="btnDelete" name="btnDelete" value="Eliminar"></li><br>
                                                            <input type="hidden" id="idUser" name="idUser" value="<?php echo $currentAdmin->getIdUser(); ?>" />
                                                            <input type="hidden" id="delete" name="delete" value="delete" />
                                                        </form>
                                                        <?php
                                                    }
                                                    ?>                                                        
                                                </ul>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Café Aromas
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- Modal
    ============================================= -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="../StyleAdmin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../StyleAdmin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../StyleAdmin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../StyleAdmin/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../StyleAdmin/build/js/custom.min.js"></script>
<?php
if (isset($_GET['successDelete'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡La eliminación fue exitosa!","Eliminación");
                $("#myModal").modal("show");
            });
        </script>';
} else if (isset($_GET['errorDelete'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡Error al eliminar!","Eliminación");
                $("#myModal").modal("show");
            });
        </script>';
} else if (isset($_GET['successCreate'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡El usuario se registró con éxito!","Registro");
                $("#myModal").modal("show");
            });
        </script>';
} else if (isset($_GET['errorCreate'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡Error al registrar el usuario!","Registro");
                $("#myModal").modal("show");
            });
        </script>';
} 
?>
<script>
    function modalSelect(modalMessage, modalTitle) {
        document.getElementsByClassName("modal-title")[0].textContent = modalTitle;
        document.getElementsByClassName("modal-body")[0].textContent = modalMessage;
    }
</script>


</body>
</html>