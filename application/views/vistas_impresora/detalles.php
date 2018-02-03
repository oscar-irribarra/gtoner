<div class="container">

    <div class="page-header" id="banner">

        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-style: outset; padding: 10%">
                    <h4>Informacion Impresora</h4>
                    <br/>                   
                    <b>Marca:</b>
                    <?php echo $datos_imp[0]->Marca; ?>
                    <br/>
                    <b>Modelo:</b>
                    <?php echo $datos_imp[0]->Modelo; ?>
                    <br/>
                    <br/>
                    <a href="<?=base_url();?>cimpresora/index" class="btn btn-default pull-left">Volver</a>
                    <br/>                 
                </div>
                <br/>
                <br/>
                <div class="box" style="border-style: outset; padding: 10%">
                    <b>Toner</b>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_asignar">Asignar Toner</button>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tbl_Toner_asignados">
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
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_datos_impresora">Agregar Impresora</button>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tbl_Datos_impresora">
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

        <!-- Modal -->
        <div class="modal fade" id="modal_asignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Toner Disponible</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form action="<?=base_url()?>cimpresora/asignar_toner" method="POST">
                                <input type="hidden" name="txtIdImpresora" id="id_imp" value="<?php echo $datos_imp[0]->IdImpresora?>" />
                                <label class="control-label col-md-2" for="cbocategorias">Categoria: </label>
                                <select class="form-control" required id="cbocategorias" name="cbcategoria">
                                    <option value="">Seleccione...</option>
                                </select>
                                <br/>
                                <label class="control-label col-md-2" for="txtSerie">Toner: </label>
                                <select class="form-control" required id="cboToner" name="cbtoner">
                                    <option value="">Seleccione...</option>
                                </select>
                                <br/>
                                <button type="submit" class="btn btn-primary">Asignar</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal -->
        <div class="modal fade" id="modal_datos_impresora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Impresora</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form action="<?=base_url()?>cimpresora/agregar_impresora" method="POST">
                                <input type="hidden" name="txtIdImpresora" id="id_imp" value="<?php echo $datos_imp[0]->IdImpresora?>" />

                                <label class="control-label" for="txtserie">Serie: </label>
                                <input type="text" id="txtserie" name="txtserie" required class="form-control" />
                                <br/>
                                <label class="control-label" for="txtnfactura">N° Factura: </label>
                                <input type="text" id="txtnfactura" name="txtnfactura" required class="form-control" />
                                <br/>
                                <label class="control-label" for="txtfecha">Fecha de compra: </label>
                                <input type="date" id="txtfecha" name="txtfcompra" required class="form-control" />
                                <br/>
                                <button type="submit" class="btn btn-primary">Asignar</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btncerrarmodal" data-dismiss="modal">X</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="modalModificardatosimp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Impresoras Disponibles</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form action="<?=base_url()?>cimpresora/agregar_impresora" method="POST">
                                <input type="hidden" name="txtIdImpresora" id="Mid_imp" />

                                <label class="control-label" for="txtserie">Serie: </label>
                                <input type="text" id="Mtxtserie" name="txtserie" required class="form-control" />
                                <br/>
                                <label class="control-label" for="txtnfactura">N° Factura: </label>
                                <input type="text" id="Mtxtnfactura" name="txtnfactura" required class="form-control" />
                                <br/>
                                <label class="control-label" for="txtfecha">Fecha de compra: </label>
                                <input type="date" id="Mtxtfecha" name="txtfcompra" required class="form-control" />
                                <br/>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="modalAignarADepartamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Impresoras Disponibles</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                            <form action="<?=base_url()?>cimpresora/asignar_impdep" method="POST">
                                <input type="hidden" id="id_impresora" name="txtidimpresora" />
                                <label class="control-label col-md-5" for="cboDepartamento">Lugar Destino: </label>
                                <select class="form-control" required id="cboDepartamento" name="cblugardestino">
                                    <option value="">Seleccione...</option>
                                </select>
                                <br/>
                                <button type="submit" class="btn btn-primary">Asignar</button>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>

    <script>
        var baseurl = "<?= base_url();?>";
    </script>