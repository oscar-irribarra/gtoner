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
          <a href="<?=base_url()?>cpedido" class="list-group-item list-group-item-action active">
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
            <h4>Pedidos</h4>
            <br/>
          </div>
          <div class="form-horizontal">
            <div class="box-body table-responsive">

              <table class="table table-bordered" id="departamentos">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Modelo</th>
                    <th>Oficina</th>
                    <th>Lugar</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listaped as $x) { ?>
                  <tr>
                    <td>
                      <?php echo $x->idpedido;?>
                    </td>
                    <td>
                      <?php echo $x->fechapedido;?>
                    </td>
                    <td class="alert-warning">
                      <?php echo $x->cantidadpedido;?>
                    </td>
                    <td>
                      <?php echo $x->modelotoner;?>
                    </td>
                    <td>
                      <?php echo $x->nombredep;?>
                    </td>
                    <td>
                      <?php echo $x->lugardep;?>
                    </td>
                    <?php if($x->estadopedido == 0){?>
                    <td class="alert-success">
                      <?php echo 'Entregado'?>
                    </td>
                    <?php }else{ ?>
                    <td class="alert-danger">
                    <a href="<?=base_url();?>cpedido/entregar_pedido/<?php echo $x->idpedido;?>" class="btn btn-danger">Entregar</a>                    
                    </td>
                    <?php }?>                  
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
    var table = $('#departamentos').DataTable({
      responsive: true,
      "order": [[0, "desc"]]
    });

  });
</script>