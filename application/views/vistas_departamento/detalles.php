<div class="container">

    <div class="page-header" id="banner">

        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-style: outset; padding: 10%">
                    <h4>Informacion Departamento</h4>
                    <br/>
                    <?php foreach ($datos_dep as $todo) { ?>
                    <b>Nombre:</b>
                    <?php echo $todo->Nombre;?>
                    <br/>
                    <b>Lugar:</b>
                    <?php echo $todo->Lugar;?>
                    <br/>
                    <input class="hidden " id='divid' value="<?php echo $datos_dep[0]->IdDepartamento?>" />
                    <br/>
                    <!--<a href="<?=base_url();?>cdepartamento/crud/<?php echo $todo->IdDepartamento;?>" class="btn btn-primary pull-right">Editar</a>-->
                    <a href="<?=base_url();?>cdepartamento/index" class="btn btn-default pull-left">Volver</a>
                    <br/>
                    <?php } ?>
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-md-8">
                <div class="box table-responsive" style="border-style: outset; padding: 10%">
                    <b>IMPRESORAS</b>
                    <br/>
                    <br/>
                    <table class="table table-hover" id="tblimp_asignadas">
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
<script>
    var baseurl = "<?= base_url();?>";
</script>