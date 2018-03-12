<div class="container">

  <div class="page-header" id="banner">

    <div class="row">

      <div class="col-md-2">
        <div class="list-group">
          <a href="<?=base_url()?>cimpresora" class="list-group-item list-group-item-action">
            Impresoras
          </a>
          <a href="<?=base_url()?>ctoner" class="list-group-item list-group-item-action">
            Toner
          </a>
          <a href="<?=base_url()?>cubicacion" class="list-group-item list-group-item-action">
            Lugares
          </a>
          <a href="<?=base_url()?>cpedido" class="list-group-item list-group-item-action">
            Pedidos
          </a>
          <a href="<?=base_url()?>centrada" class="list-group-item list-group-item-action active">
            Entradas
          </a>
          <a href="<?=base_url()?>csalida" class="list-group-item list-group-item-action">
            Salidas
          </a>
          <a href="<?=base_url()?>cusuario" class="list-group-item list-group-item-action">
            Usuarios
          </a>
        </div>
        <br/>
        <br/>
      </div>

      <div class="col-md-10">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <b>Entradas</b>
          <a href="#" title="Modal Entrada" class="btn btn-primary pull-right" data-toggle="modal"
        data-target="#modalEntrada" onclick="vaciarModalEntrada()">Nueva Entrada</a>
          <br/>
          <br/>
          <table class="table table-hover" id="tblEntrada">
            <thead>
              <tr>
                <th>ID</th>
                <th>Toner</th>
                <th>Cantidad</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
            
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalEntrada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Entrada</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form>
                                <input type="hidden" id="txtidEntrada" value="0" />

                                <label class="control-label" for="cbotoner">Toner: </label>                                
                                <select class="form-control" required id="cbotoner" name="cboTonerentrada" >
                                  <option value="" >Seleccione...</option>
                                </select>
                                <br/>
                                <label class="control-label" for="txtcantidad">Cantidad: </label>
                                <input type="number" class="form-control"  id="txtcantidad" min="1" required placeholder="Min 1">

                                <br/>
                                               
                                <br/>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="guardarEntrada" class="btn btn-primary">Guardar</button>
                        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
                    </div>
                </div>
            </div>
        </div>

<script>
  var baseurl = "<?= base_url();?>";
</script>