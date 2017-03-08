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

        <title>Café Aromas</title>

        <!-- Bootstrap -->
        <link href="../StyleAdmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../StyleAdmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../StyleAdmin/vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="../StyleAdmin/build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <?php include './reusableMenu.php';
        include_once '../BusinessAdmin/ProductAdminBusiness.php';
        ?>
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
                                    <h1 id="glyphicons" class="page-header">Administrar información</h1>
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <form id="frmInformation" method="POST" action="../BusinessAdmin/ProductAction.php">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Productos</a>
                                                </li>                                                        
                                                <li role="presentation" class=""><input style="background: #ffffff;" type="submit" class="btn btn-large btn-block" value="Registar"/>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Eliminar productos</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                    <label>Nombre:</label>
                                                    <input type="text"  style="width: 90%" name="txtNameProduct" id="txtNameProduct"/>
                                                    <label>Descripción:</label>
                                                    <textarea id="txtDescriptionProduct" name="txtDescriptionProduct" class="form-control text-justify" rows="6" placeholder="Escriba el texto aquí" required=""></textarea>
                                                </div>
                                                <input type="hidden" name="create" value="create">  
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    <ul>
                                                        <?php
                                                        $productBusiness = new ProductAdminBusiness();
                                                        $product = $productBusiness->getAllTBProducts();
                                                        $maxEs = sizeof($product);
                                                        for ($j = 0; $j < $maxEs; $j++) {
                                                            $currentProduct = $product[$j];
                                                            ?>
                                                            <form id="frmDelete" method="POST" action="../BusinessAdmin/ProductAction.php" enctype="multipart/form-data">
                                                                <li><label style="width: 50%;"><?php echo $currentProduct->getNameProduct(); ?></label>
                                                                    <input type="submit" id="btnDelete" name="btnDelete" value="Eliminar"></li><br>
                                                                <input type="hidden" id="idProduct" name="idProduct" value="<?php echo $currentProduct->getIdProduct(); ?>" />
                                                                <input type="hidden" id="delete" name="delete" value="delete" />
                                                            </form>
                                                            <?php
                                                        }
                                                        ?>                                                        
                                                    </ul>
                                                </div>

                                            </div>
                                        </form>
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
if (isset($_GET['success'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡El registro fue exitoso!","Registro");
                $("#myModal").modal("show");
            });
        </script>';
} else if (isset($_GET['error'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡Error al registar!","Registro");
                $("#myModal").modal("show");
            });
        </script>';
} else if (isset($_GET['errorData'])) {
    echo '<script>                
            $(document).ready(function(){
                modalSelect("¡Debe ingresar todos los campos!","Registro");
                $("#myModal").modal("show");
            });
        </script>';
}if (isset($_GET['successDelete'])) {
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