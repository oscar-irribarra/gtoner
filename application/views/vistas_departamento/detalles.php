<div class="container">

    <div class="page-header" id="banner">

        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-style: outset; padding: 10%">
                    <h4>Informacion Departamento</h4>
                    <br/>
                    <b>Nombre:</b>
                    <?php echo $detalle_departamento[0]->Nombre?>
                    <br/>
                    <b>Lugar:</b>
                    <?php echo $detalle_departamento[0]->Lugar?>
                    <br/>
                    <input class="hidden " id='iddepartamento' value="<?php echo $detalle_departamento[0]->IdDepartamento?>" />
                    <br/>
                   <a href="<?=base_url();?>cubicacion/detalles/<?php echo $detalle_departamento[0]->IdUbicacion?>" class="btn btn-default pull-left">Volver</a>
                    <br/>                   
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-md-8">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <b>Impresoras Asignadas</b>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tblImpdep">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Serie</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <br/>
                <br/>
                
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalConsumoImpresora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Consumo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box table-responsive" style="border-style: outset; padding: 10%">
                        <div id="posts">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-default" data-dismiss="modal">X</a>
                    </div>
                </div>
            </div>
        </div>


<script>
    var baseurl = "<?= base_url();?>";
</script>