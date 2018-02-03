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
          <a href="<?=base_url();?>ctoner/crud" class="btn btn-primary pull-right">Nuevo Toner</a>
            <h4>Toner/Tambor</h4>
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">
              
              <table class="table table-bordered" id="tbl_toner">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th>Stock</th>                    
                    <!--<th></th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listato as $todo) { ?>
                  <tr>
                    <td>
                      <?php echo $todo->IdToner;?>
                    </td>
                    <td>
                      <?php echo $todo->Marca;?>
                    </td>
                    <td>
                      <?php echo $todo->Modelo;?>
                    </td>
                    <td>
                      <?php echo $todo->Nombre;?>
                    </td>
                    <td>
                      <?php echo $todo->Stock;?>
                    </td>
                   <!-- <td>
                      <a href="<?=base_url();?>ctoner/crud" class="btn btn-primary">Editar</a>
                    </td>-->
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
    var table = $('#tbl_toner').DataTable({
      responsive: true
    });

  });
</script>