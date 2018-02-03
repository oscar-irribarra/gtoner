<div class="container">
    <div class="page-header" id="banner">

        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box" style="border-style: outset; padding: 10%">
                    <div class="box-header with-border">
                        <h4>Formulario</h4>
                        <br/>
                       <?php echo $mensaje;?>
                        
                    </div>
                    <div class="form-horizontal">
                        <form action="<?=base_url();?>cdepartamento/guardar_departamento" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="Nombre">Nombre</label>
                                    <div class=" col-md-12">
                                        <input type="text" class="form-control" required name="txtNombre" placeholder="ej: RRHH" id="Nombre">
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="Lugar">Lugar</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" required name="txtLugar" placeholder="ej: DESAM" id="Lugar">
                                    </div>
                                </div>
                                <br/>                           
                            </div>
                            <div class="box-footer">
                                <br/>
                                <a href="<?=base_url();?>cdepartamento" class="btn btn-default">Volver</a>
                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



<!-- /.container -->