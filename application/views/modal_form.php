
<div class="modal fade" id="formRv">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Contacto para reservas</h4>
            </div>
            <form role="form" id='form-contact'>
                <div class="modal-body">
                    <input type="hidden" name="nund" id="nund"><input type="hidden" name="nent" id="nent">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="names" class="control-label col-xs-12 col-md-2" >
                            <span class="fa fa-user text-success"></span>&nbsp;Nombres</label>
                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                <input type="text" class="form-control" id="names" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="control-label col-xs-12 col-md-2" >
                            <span class="fa fa-phone text-primary"></span>&nbsp;Teléfono</label>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <input type="text" class="form-control" id="telefono" >
                            </div>
                            <label for="email_" class="control-label col-xs-12 col-md-2" >
                            <span class="fa fa-envelope-o text-primary"></span>&nbsp;E-mail</label>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <input type="text" class="form-control" id="email_" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="control-label col-xs-12 col-md-3" >
                            <span class="fa fa-commenting-o text-success"></span>&nbsp;Comentarios</label>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                <textarea class="form-control" id="comments" rows="5"></textarea> 
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                    <button type="reset" class="btn btn-danger">limpiar</button>
                    <button type="button" class="btn btn-primary info-send">enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>