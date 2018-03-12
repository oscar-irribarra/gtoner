<div class="container">

  <div class="page-header" id="banner">

    <div class="row">

      <div class="col-md-2">
        <div class="list-group">
          <a href="<?=base_url();?>cimpresora" class="list-group-item list-group-item-action">
            Impresoras
          </a>
          <a href="<?=base_url()?>ctoner" class="list-group-item list-group-item-action">
            Toner
          </a>
          <a href="<?=base_url()?>cubicacion" class="list-group-item list-group-item-action active">
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
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <b>Lugares</b>
          <a href="#" title="Modal Ubicacion" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalUbicacion"
            onclick="vaciarModalUbicacion()">Nuevo Lugar</a>
          <br/>
          <br/>

          <table class="table table-hover" id="tblUbicaciones">
            <thead>
              <tr>
                <th>Id</th>
                <th>Lugar</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <br/>
        <br/>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modalUbicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Lugar</h4>
      </div>
      <div class="modal-body">
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <form>
            <input type="hidden" id="txtidUbicacion" value="0" />

            <label class="control-label" for="txtNombre">Nombre: </label>
            <input type="text" id="txtNombre" required class="form-control" />
            <br/>

            <br/>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="guardarUbicacion" class="btn btn-primary">Guardar</button>
        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
      </div>
    </div>
  </div>
</div>

<script>
  var baseurl = "<?= base_url();?>";
</script>