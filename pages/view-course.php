<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showCourse();


	if(isset($_GET['del']))
    {
           
          $obj->del_course(intval($_GET['del']));
          
       
  }

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cours</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("BIENVENUE"." ".htmlentities($_SESSION['login']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste du cours
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Abréviation</th>
                                            <th>Niveau</th>
                                            <th>Date de creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
        
                                     while($res=$rs->fetch_object()){?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo htmlentities( strtoupper($res->cid));?></td>
                                            <td><?php echo htmlentities( strtoupper($res->cshort));?></td>
                                            <td><?php echo htmlentities(strtoupper($res->cfull));?></td>
                                            <td><?php echo htmlentities($res->cdate);?></td>
                                             <td>&nbsp;&nbsp;<a href="edit-course.php?cid=<?php echo htmlentities($res->cid);?>"><p class="fa fa-edit"></p></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="view-course.php?del=<?php echo htmlentities($res->cid); ?>"> <p class="fa fa-times-circle"></p></td>
                                            
                                        </tr>
                                        
                                    <?php }?>   	           
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                 "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": " rien n'a été trouvé - Désolé",
            "info": "Affichage de la page _PAGE_ de _PAGES_",
            "infoEmpty": "Aucun enregistrement disponible",
            "infoFiltered": "(filtré à partir des _MAX_ enregistrements totaux )",
            "search":"Recherche",
            paginate: {
            first:    '«',
            previous: 'Précédent',
            next:     'Suivant',
            last:     '»'
        },
        }
        });
    });
    </script>

</body>

</html>
