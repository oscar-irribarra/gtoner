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
          <a href="<?=base_url()?>cdepartamento" class="list-group-item list-group-item-action">
            Departamentos
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
        </div>
        <br/>
        <br/>
      </div>

      <div class="col-md-10">
        <div class="box" style="border-style: outset; padding: 10%;">

          <div class="box-header with-border">
          <a href="<?=base_url();?>cimpresora/crud" class="btn btn-primary pull-right">Nueva Impresora</a>
            <h4>Impresoras</h4>
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">
              <table class="table table-bordered" id="tbl_impresoras">

                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>                   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listaimp as $todo) { ?>
                  <tr>
                    <td>
                      <?php echo $todo->IdImpresora;?>
                    </td>
                    <td>
                      <?php echo $todo->Marca;?>
                    </td>
                    <td>
                      <?php echo $todo->Modelo;?>
                    </td>
                   <td>
                      <a href="<?=base_url();?>cimpresora/detalles/<?php echo $todo->IdImpresora;?>" class="btn btn-primary">Detalles</a>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
            <div class="box-footer">
              <br/>
              
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#tbl_impresoras').DataTable({
      responsive: true
    });

  });
</script>