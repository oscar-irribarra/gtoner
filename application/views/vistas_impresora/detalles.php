<div class="container">

    <div class="page-header" id="banner">

        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-style: outset; padding: 10%">
                    <h4>Informacion Impresora</h4>
                    <br/>
                    <b>Marca:</b>
                    <?php echo $detalle_dispositivo[0]->Marca; ?>
                    <br/>
                    <b>Modelo:</b>
                    <?php echo $detalle_dispositivo[0]->Modelo; ?>
                    <input class="hidden " id='idDispositivo' value="<?php echo $detalle_dispositivo[0]->IdDispositivo;?>" />
                    <br/>
                    <br/>
                    <a href="<?=base_url();?>cimpresora" class="btn btn-default pull-left">Volver</a>
                    <br/>
                </div>
                <br/>
                <br/>
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <b>Toner</b>
                    <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_AsignarDispTon">Asignar Toner</a>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tblDispToner">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-md-8">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <b>Impresoras</b>
                    <a href="#" title="Modificar Datos" class="btn btn-primary pull-right" onclick="_vaciarModalImpresora()" data-toggle="modal"
                        data-target="#modalImpresora">Nueva Impresora</a>
                    </li>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tblImpresoras">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Serie</th>
                                <th>N° Factura</th>
                                <th>Fecha de Compra</th>
                                <th>Estado</th>
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
<!-- Modal Asignar Toner al dispositivo -->
<div class="modal fade" id="modal_AsignarDispTon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Asignar Toner</h4>
            </div>
            <div class="modal-body">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <form>
                        <label class="control-label col-md-2" for="cbocategorias">Categoria: </label>
                        <select class="form-control" required id="cbocategoria" name="cbcategoria">
                            <option value="">Seleccione...</option>
                        </select>
                        <br/>
                        <label class="control-label col-md-2" for="cboToner">Toner: </label>
                        <select class="form-control" required id="cboToner" name="cbtoner">
                            <option value="">Seleccione...</option>
                        </select>
                        <br/>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarDispTon" class="btn btn-primary">Asignar</button>
                <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Confirmacion para eliminar asignacion toner/dispositivo -->
<div class="modal fade" id="_modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
            </div>
            <div class="modal-body">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <input type="hidden" id="txtIdDispTon" />
                    <label>Para confirmar esta tarea escriba 'Sí'</label>
                    <input type="text" id="txtConfirmacion" required class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="eliminarDispTon" class="btn btn-primary">Si</button>
                <a type="button" class="btn btn-default" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Crud para impresoras -->
<div class="modal fade" id="modalImpresora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Datos Impresora</h4>
            </div>
            <div class="modal-body">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <form>
                        <input type="hidden" id="txtidImpresora" value="0" />

                        <label class="control-label" for="txtserie">Serie: </label>
                        <input type="text" id="txtSerie" required class="form-control" />
                        <br/>
                        <label class="control-label" for="txtnfactura">N° Factura: </label>
                        <input type="text" id="txtNfactura" required class="form-control" />
                        <br/>
                        <label class="control-label" for="txtfecha">Fecha de compra: </label>
                        <input type="date" id="txtFecha" required class="form-control" />
                        <br/>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarImpresora" class="btn btn-primary">Guardar</button>
                <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Asignar Impresora a un Departamento -->
<div class="modal fade" id="modalImpDep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Asignar a Departamento</h4>
            </div>
            <div class="modal-body">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <form>
                        <input type="hidden" id="txtidDatosImpresora" />
                        <label class="control-label" for="cboDepartamento">Destino: </label>
                        <select class="form-control" required id="cboUbicacion" name="cblugardestino">
                            <option value="">Seleccione...</option>
                        </select>
                        <br/>
                        <label class="control-label" for="cboDepartamento">Departamento: </label>
                        <select class="form-control" required id="cboDepartamento" name="cblugardestino">
                            <option value="">Seleccione...</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarImpDep" class="btn btn-primary">Asignar</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
            </div>
        </div>
    </div>
</div>



<script>
    var baseurl = "<?= base_url();?>";
</script>