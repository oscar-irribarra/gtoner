<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>window.jQuery || document.write('<script src="<?=base_url()?>../js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?=base_url()?>/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/js/jquery.toast.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?=base_url()?>/js/ie10-viewport-bug-workaround.js"></script>

<!-- JS INICIO -->
<?php if ($this->uri->segment(1) == '' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/modulos/inicio.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cinicio' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/modulos/inicio.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cinicio' and $this->uri->segment(2) == 'login') {?>
<script src="<?=base_url()?>/js/modulos/inicio.js"></script>
<?php }?>


<!-- JS DEPARTAMENTOS -->
<?php if ($this->uri->segment(1) == 'cubicacion' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/js_departamento/ubicacion.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cubicacion' and $this->uri->segment(2) == 'detalles') {?>
<script src="<?=base_url()?>/js/js_departamento/departamento.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cdepartamento' and $this->uri->segment(2) == 'detalles') {?>
<script src="<?=base_url()?>/js/js_departamento/departamento.js"></script>
<?php }?>

<!-- JS IMPRESORAS -->
<?php if ($this->uri->segment(1) == 'cimpresora' and $this->uri->segment(2) == 'detalles') {?>
<script src="<?=base_url()?>/js/modulos/categoria.js"></script>
<script src="<?=base_url()?>/js/js_impresora/impresora.js"></script>
<script src="<?=base_url()?>/js/js_impresora/detalledispositivo.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cimpresora' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/js_impresora/dispositivo.js"></script>
<?php }?>

<!-- JS TONER -->
<?php if ($this->uri->segment(1) == 'ctoner' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/modulos/categoria.js"></script>
<script src="<?=base_url()?>/js/js_toner/toner.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'ctoner' and $this->uri->segment(2) == 'indextoner') {?>
<script src="<?=base_url()?>/js/js_toner/tonerdep.js"></script>
<?php }?>


<!-- JS ENTRADA -->
<?php if ($this->uri->segment(1) == 'centrada' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/js_entrada/entrada.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'centrada' and $this->uri->segment(2) == 'indexentrada') {?>
<script src="<?=base_url()?>/js/js_entrada/entradadep.js"></script>
<?php }?>

<!-- JS SALIDAS -->
<?php if ($this->uri->segment(1) == 'csalida' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/js_salida/salida.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'csalida' and $this->uri->segment(2) == 'indexsalida') {?>
<script src="<?=base_url()?>/js/js_salida/salidadep.js"></script>
<?php }?>

<!-- JS PEDIDOS -->
<?php if ($this->uri->segment(1) == 'cpedido' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/js_pedido/pedido.js"></script>
<?php }?>
<?php if ($this->uri->segment(1) == 'cpedido' and $this->uri->segment(2) == 'indexpedido') {?>
<script src="<?=base_url()?>/js/js_pedido/pedidodep.js"></script>
<?php }?>

<!-- JS USUARIO -->
<?php if ($this->uri->segment(1) == 'cusuario' and $this->uri->segment(2) == '') {?>
<script src="<?=base_url()?>/js/modulos/usuario.js"></script>
<?php }?>

</body>

</html>