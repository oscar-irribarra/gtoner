<div class="container">
    <div class="page-header" id="banner">

        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box" style="border-style: outset; padding: 10%">
                    <div class="box-header with-border">
                        <h4>Formulario</h4>
                        <br/>
                    </div>
                    <div class="form-horizontal">
                        <form action="<?=base_url();?>centrada/guardar_entrada" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="Nombre">Toner</label>
                                    <div class=" col-md-12">
                                        <select class="form-control" required id="cbotoner" name="cboTonerentrada" >
                                        <option value="" >Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="Lugar">Cantidad</label>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" min="1" required name="txtCantidad" placeholder="Min 1" id="Lugar">
                                    </div>
                                </div>
                                <br/>                           
                            </div>
                            <div class="box-footer">
                                <br/>
                                <a href="<?=base_url();?>centrada" class="btn btn-default">Volver</a>
                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    var baseurl = "<?= base_url();?>";
</script>



<!-- /.container -->