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
          <a href="<?=base_url()?>cdepartamento" class="list-group-item list-group-item-action">
            Departamentos
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
        </div>
        <br/>
        <br/>
      </div>
      <div class="col-md-10">
        <div class="box" style="border-style: outset; padding: 10%">

          <div class="box-header with-border">
          <a href="<?=base_url()?>centrada/crud" class="btn btn-primary pull-right">Nueva Entrada</a>
            <h4>Entradas</h4>
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">

              <table class="table table-bordered" id="tbl_entradas">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Toner</th>
                    
                    <th>Cantidad</th> 
                    <th>Fecha</th>                 
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lista_ent as $x) { ?>
                  <tr>
                    <td>
                      <?php echo $x->IdEntrada;?>
                    </td>
                    <td>
                      <?php echo $x->Modelo;?>
                    </td>
                   
                    <td>
                      <?php echo $x->Cantidad;?>
                    </td>   
                    <td>
                      <?php echo $x->Fecha;?>
                    </td>               
                  </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
            <div class="box-footer">

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1"></div>

    </div>

  </div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#tbl_entradas').DataTable({
      responsive: true,
      "order": [[ 0, "desc" ]]
    });

  });
</script>