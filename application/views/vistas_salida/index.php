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
          <a href="<?=base_url()?>centrada" class="list-group-item list-group-item-action">
            Entradas
          </a>
          <a href="<?=base_url()?>csalida" class="list-group-item list-group-item-action active">
            Salidas
          </a>
        </div>
        <br/>
        <br/>
      </div>
      <div class="col-md-10">
        <div class="box" style="border-style: outset; padding: 10%">

          <div class="box-header with-border">
          <a href="<?=base_url()?>csalida/crud" class="btn btn-primary pull-right">Nueva Salida</a>

            <h4>Salidas</h4>
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">

              <table class="table table-bordered" id="salidas">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Departamento</th>
                    <th>Lugar</th>
                    <th>Toner</th>  
                    <th>Cantidad</th>                 
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lista_salida as $x) { ?>
                  <tr>
                    <td>
                      <?php echo $x->sidsalida;?>
                    </td>
                    <td>
                      <?php echo $x->sfecha;?>
                    </td>
                    <td>
                      <?php echo $x->dnombre;?>
                    </td>
                    <td>
                      <?php echo $x->dlugar;?>
                    </td>
                    <td>
                      <?php echo $x->tmodelo;?>
                    </td>     
                    <td>
                      <?php echo $x->scantidad;?>
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
    var table = $('#salidas').DataTable({
      responsive: true,
      "order": [[ 0, "desc" ]]
    });

  });
</script>