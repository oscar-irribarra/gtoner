<div class="container">

    <div class="page-header" id="banner">

        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-style: outset; padding: 10%">
                    <h4>Informacion Lugar</h4>
                    <br/>
                    <b>Nombre:</b>
                    <?php echo $detalle_ubicacion[0]->Nombre; ?>
                    <br/>

                    <input class="hidden " id='idUbicacion' value="<?php echo $detalle_ubicacion[0]->IdUbicacion;?>" />
                    <br/>
                    <br/>
                    <a href="<?=base_url();?>cubicacion" class="btn btn-default pull-left">Volver</a>
                    <br/>
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-md-8">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <b>Departamentos</b>
                    <a href="#" title="Modificar Datos" class="btn btn-primary pull-right" onclick="vaciarModalDepartamento()" data-toggle="modal"
                        data-target="#modalDepartamento">Nuevo Departamento</a>
                    </li>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tblDepartamentos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Departamento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <br/>
                <br/>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalDepartamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Departamento</h4>
            </div>
            <div class="modal-body">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <form>
                        <input type="hidden" id="txtidDepartamento" value="0" />

                        <label class="control-label" for="txtnombre">Nombre: </label>
                        <input type="text" id="txtnombre" required class="form-control" />
                        <br/>

                        <br/>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarDepartamento" class="btn btn-primary">Guardar</button>
                <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
            </div>
        </div>
    </div>
</div>



<script>
    var baseurl = "<?= base_url();?>";
</script>