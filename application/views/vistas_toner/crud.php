<div class="container">
<div class="page-header" id="banner">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box" style="border-style: outset; padding: 10%">
                <div class="box-header with-border">
                    <h3>Formulario</h3>
                    <br/>
                </div>
                <div class="form-horizontal">
                    <form action="<?=base_url();?>ctoner/guardar_toner" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="Marca">Marca</label>
                            <div class=" col-md-12">
                                <input type="text" class="form-control" name="txtMarca" required placeholder="ej: Brother" id="Marca">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="Modelo">Modelo</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="txtModelo" required placeholder="ej: TN-750" id="Modelo">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label class="control-label col-md-2" for="Categoria">Categoria</label>
                            <div class="col-md-12">
                                <select class="form-control" required name="cbCategoria" id="cbocategorias">
                                    <option value="">Seleccione..</option>                             
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <br/>
                        <a href="<?=base_url();?>ctoner" class="btn btn-default">Volver</a>
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

