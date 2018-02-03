
  <div class="container">

    <div class="page-header" id="banner">
      <div class="container">
        <div class="row">            
           
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Solicitud Toner</h3>
                        </div>
                        <form action="<?=base_url();?>cpedido/guardar_pedido" method="POST">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label class="col-form-label" for="Serie">Serie Impresora</label>
                                <input type="text" class="form-control" name="txtSerie" required placeholder="ej: 92836361226" id="Serie">
                              </div>
                              n° factura
                              fecha de compra
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ingresar</button>                           
                        </div>
                        </form>
                    </div>
                </div>            
            </div>
       
        </div>
    </div>
    </div>

  </div>
  <!-- /.container -->
