<div class="container">
  <div class="page-header" id="banner">

    <div class="row">

      <div class="col-md-2">
        <div class="list-group">
          <a href="<?=base_url()?>cpedido" class="list-group-item list-group-item-action ">
            Pedidos
          </a>
          <a href="<?=base_url()?>ctoner" class="list-group-item list-group-item-action">
            Toner
          </a>
          <a href="<?=base_url()?>centrada" class="list-group-item list-group-item-action active">
            Entradas
          </a>
          <a href="<?=base_url()?>csalida" class="list-group-item list-group-item-action">
            Salidas
          </a>
        </div>
        <br/>
        <br/>
      </div>
      <div class="col-md-10">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <b>Pedidos</b>
          <br/>
          <br/>
          <table class="table table-hover" id="tblEntrada">
            <thead>
              <tr>
                <th>ID</th>
                <th>Origen</th>                
                <th>Destino</th>
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

<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
          </div>
          <div class="modal-body">
              <div class="box table-responsive" style="border-style: outset; padding: 10%">
              <input type="hidden" id="txtidConfirmacion" />
              <label>Para confirmar esta entrega escriba ' Sí '</label>    
              <input type="text" id="txtsiconfirmacion" required class="form-control" />                                            
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" id="entregarPedido" class="btn btn-primary">Si</button>
              <a type="button" class="btn btn-default" data-dismiss="modal">No</a>
          </div>
      </div>
  </div>
</div>

<script>
  var baseurl = "<?= base_url();?>";
</script>