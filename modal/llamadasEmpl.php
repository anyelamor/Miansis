<?php
  if (isset($conexion))
  {
?>
<!-- Modal -->
<div class="modal fade" id="llamadasAten" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Llamadas de atención</h4>
    </div>
    <div class="modal-body">
    <form class="form-horizontal" method="post" id="guardar_llamadas" name="guardar_llamadas">
    <div id="resultados_ajax2"></div>
    <div class="form-group">
    <div class="col-sm-8">
    <input type="hidden" class="form-control" id="codigo2" name="codigo2" >
    </div>
    </div>

    <div class="form-group">
    <label for="desc" class="col-sm-3 control-label">Descripción</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="desc" name="desc" >
    </div>
    </div>
      <div class="form-group">
      <label for="fecha" class="col-sm-3 control-label">Fecha</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="fecha" name="fecha" >
      </div>
      </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary" id="guardar_datos2">Guardar datos</button>
    </div>
    </form>
     </div>
  </div>
  </div>
</div>
<?php
  }
?>
