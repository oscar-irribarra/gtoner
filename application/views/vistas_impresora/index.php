<div class="container">
  <div class="page-header" id="banner">

    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="<?=base_url()?>cimpresora" class="list-group-item list-group-item-action active">
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
          <a href="<?=base_url()?>centrada" class="list-group-item list-group-item-action">
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
        <div class="box table-responsive" style="border-style: outset; padding: 10%;">
        <a href="#" title="Modal Dispositivo" class="btn btn-primary pull-right" data-toggle="modal"
        data-target="#modalDispositivo" onclick="vaciarModalDispositivo()">Nueva Impresora</a>
        <b>Impresoras</b>
          <br/>
          <br/>

          <table class="table table-hover" id="tblDispositivos">
            <thead>
              <tr>
                <th>Id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

          <br/>
          <br/>
        </div>
      </div>

    </div>

  </div>
</div>

<div class="modal fade" id="modalDispositivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Impresora</h4>
      </div>
      <div class="modal-body">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <form>
            <input type="hidden" id="txtidDispositivo" value="0" />

            <label class="control-label" for="txtMarcaImp">Marca: </label>
            <input type="text" id="txtmarcaDispositivo" required class="form-control" />
            <br/>
            <label class="control-label" for="txtMarcaImp">Modelo: </label>
            <input type="text" id="txtmodeloDispositivo" required class="form-control" />
            <br/>            
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="guardarDispositivo" class="btn btn-primary">Guardar</button>
        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
      </div>
    </div>
  </div>
</div>

<script>
  var baseurl = "<?= base_url();?>";
</script>