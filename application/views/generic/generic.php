  <div id="page-wrapper">
  <div class="container">


    <div class="row">
        <div class="col-xs-11 col-md-11 col-lg-11">
          <ol class="breadcrumb">
            <?php echo "<li><span class='fa fa-home text-success'></span>&nbsp;".anchor(base_url('index.php/panel_usr'), 'INICIO',"")."</li>" ?>
            <?php echo "<li><span class='fa fa-bookmark text-danger'></span>&nbsp;".anchor(base_url('index.php/panel_enti/datenti/'.$this->session->userdata('act_enti')),getname_enti(),"")."</li>" ?>
            <?php echo $enlace.$enlace_activo;  ?>
          </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-11 col-lg-11">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="page-header">
                <h1><?php echo $titulo; ?></h1>
              </div>
            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $titulo_panel; ?></h3>
                </div>
                <div class="panel-body">
                    <?php 
                        foreach ($contenido_panel as $value) {
                        
                        echo $value; 
                           
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    </div><!-- fin container -->
      <hr>
      <footer>
        <p>&copy; 2016 </p>
      </footer>
    
    </div> 
    <!-- fin page-wrapper -->
    </div> 
    <!-- fin wrapper -->


    <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
        role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-time">
                        </span>Cargando...
                     </h4>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-info
                        progress-bar-striped active"
                        style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        foreach ($modales as $value) {
    
            echo $value; 

        }
    ?>



   <br>
  </body>
  <script type="text/javascript" charset="UTF-8" src="<?php echo base_url("assets/public/js/general_func.js?n=".rand()); ?>"></script>
  <script type="text/javascript" charset="UTF-8" src="<?php echo $enlace_js; ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/public/css/style.css"); ?>">
</html>
