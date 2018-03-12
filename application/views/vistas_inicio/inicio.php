<div class="container">
    <div class="page-header" id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Solicitud Toner</h3>
                                <!-- <img src="<?=base_url();?>img/depsalud.png" alt="Smiley face" height="42" width="42"> -->
                            </div>
                            <form action="<?=base_url();?>cpedido/guardarPedido" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-form-label" for="Serie">Serie Impresora</label>
                                        <input type="text" class="form-control"  required placeholder="ej: UBK92836361226" id="txtSerie">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="Serie">Tipo</label>                                        
                                        <div class="radio">
                                            <label>
                                              <input type="radio" name="opciones" id="opcionesSolicitud" value="1" checked>
                                              <b>Toner</b>
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="opciones" id="opcionesSolicitud" value="2">
                                              <b>Tambor</b>
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="opciones" id="opcionesSolicitud" value="3">
                                              <b>Tinta</b>
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="opciones" id="opcionesSolicitud" value="4">
                                              <b>Tambor</b>
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <a href="#" title="Modal Confirmacion" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalConfirmacion">Solicitar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmar Pedido</h4>
      </div>
      <div class="modal-body">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <form>           
            <label class="control-label" for="txtConfirmacion">Para confirmar escriba ' Si ' </label>
            <input type="text" id="txtConfirmacion" required class="form-control" />
            <br/>            
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="guardarPedido" class="btn btn-primary">Confirmar</button>
        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
      </div>
    </div>
  </div>
</div>

<script>
  var baseurl = "<?= base_url();?>";
</script>