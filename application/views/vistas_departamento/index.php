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
          <a href="<?=base_url()?>cdepartamento" class="list-group-item list-group-item-action active">
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
        <div class="box" style="border-style: outset; padding: 10%">

          <div class="box-header with-border">
          <a href="<?=base_url();?>cdepartamento/crud" class="btn btn-primary pull-right">Nuevo Departamento</a>
            <h4>Departamentos</h4>          
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">

              <table class="table table-bordered" id="departamentos">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Lugar</th>                   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listadep as $todo) { ?>
                  <tr>
                    <td>
                      <?php echo $todo->IdDepartamento;?>
                    </td>
                    <td>
                      <?php echo $todo->Nombre;?>
                    </td>
                    <td>
                      <?php echo $todo->Lugar;?>
                    </td>
               
                    <td>
                      <a href='<?=base_url();?>cdepartamento/detalles/<?php echo $todo->IdDepartamento;?>' class="btn btn-primary">Detalles</a>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#departamentos').DataTable({
      responsive: true
    });

  });
</script>