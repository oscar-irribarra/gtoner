

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script>window.jQuery || document.write('<script src="<?=base_url()?>../js/vendor/jquery.min.js"><\/script>')</script>
  <script src="<?=base_url()?>/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?=base_url()?>/js/ie10-viewport-bug-workaround.js"></script>

  <?php if($this->uri->segment(1)=='ctoner' and $this->uri->segment(2)=='crud' ){?>
    <script src="<?=base_url()?>/js/categoria.js"></script>   
    <script src="<?=base_url()?>/js/toner.js"></script>      
  <?php }?>

  <?php if($this->uri->segment(1)=='cdepartamento' and $this->uri->segment(2)=='detalles' ){?> 
    <script src="<?=base_url()?>/js/departamento.js"></script>     
  <?php }?>

  <?php if($this->uri->segment(1)=='cimpresora' and $this->uri->segment(2)=='detalles' ){?> 
    <script src="<?=base_url()?>/js/categoria.js"></script> 
    <script src="<?=base_url()?>/js/toner.js"></script>
    <script src="<?=base_url()?>/js/impresora.js"></script>     
  <?php }?>

  <?php if($this->uri->segment(1)=='centrada' and $this->uri->segment(2)=='crud' ){?> 
    <script src="<?=base_url()?>/js/entrada.js"></script>     
  <?php }?>

  <?php if($this->uri->segment(1)=='csalida' and $this->uri->segment(2)=='crud' ){?>
    <script src="<?=base_url()?>/js/salida.js"></script>     
  <?php }?>
</body>

</html>