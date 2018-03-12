<div class="container">

  <div class="page-header" id="banner">

    <div class="row">

      <div class="col-md-2">
        <div class="list-group">
          <a href="<?=base_url();?>cimpresora" class="list-group-item list-group-item-action">
            Impresoras
          </a>
          <a href="<?=base_url()?>ctoner" class="list-group-item list-group-item-action active">
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
        <div class="box table-responsive" style="border-style: outset; padding: 10%">
          <b>Toner/Tambor</b>
          <a href="#" title="Modal Toner" class="btn btn-primary pull-right" data-toggle="modal"
        data-target="#modalToner" onclick="vaciarModalToner()">Nuevo Toner</a>
          <br/>
          <br/>

          <table class="table table-hover" id="tblToner">
            <thead>
              <tr>
                <th>Id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Categoria</th>
                <th>Ubicacion</th>
                <th>Stock</th>                
                <th></th>
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

<div class="modal fade" id="modalToner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Toner</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form>
                                <input type="hidden" id="txtidToner" value="0" />

                                <label class="control-label" for="txtMarca">Marca: </label>
                                <input type="text" id="txtMarca" required class="form-control" />
                                <br/>
                                <label class="control-label" for="txtModelo">Modelo: </label>
                                <input type="text" id="txtModelo" required class="form-control" />                                               
                                <br/>
                                <label class="control-label" for="cbocategoria">Categoria: </label>                                
                                <select class="form-control" required id="cbocategoria" >
                                  <option value="" >Seleccione...</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="guardarToner" class="btn btn-primary">Guardar</button>
                        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
                    </div>
                </div>
            </div>
        </div>

<script>
  var baseurl = "<?= base_url();?>";
</script>