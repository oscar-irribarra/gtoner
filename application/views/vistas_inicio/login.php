<div class="container">
    <div class="page-header" id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Ingresar</h3>
                                <!-- <img src="<?=base_url();?>img/depsalud.png" alt="Smiley face" height="42" width="42"> -->
                            </div>
                            <form action="#" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-form-label" for="txtUsuario">Usuario</label>
                                        <input type="text" class="form-control"  required id="txtUsuario">
                                        <br/>
                                        <label class="col-form-label" for="txtContraseña">Contraseña</label>
                                        <input type="password" class="form-control"  required id="txtContraseña">
                                    </div>                                  
                                </div>
                                <div class="modal-footer">
                                 <button type="button" id="btningresar" class="btn btn-primary">Ingresar</button>
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
        <h4 class="modal-title" id="myModalLabel">Impresora</h4>
      </div>
      <div class="modal-body">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <form>           
            <label class="control-label" for="txtMarcaImp">Para confirmar escriba 'Sí' </label>
            <input type="text" id="txtconfirmacion" required class="form-control" />
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