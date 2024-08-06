<h2>{{modeDsc}}</h2>
<form action="index.php?page=Microcontroladores_MicrocontroladoresForm&mode={{mode}}&id={{id}}" method="post">
  <div>
    <input type="hidden" name="mode" value="{{mode}}">
    <input type="hidden" name="cxfToken" value="{{cxfToken}}">
  </div>
  <div>
    <label for="id">Código</label>
    <input type="text" name="id" id="id" value="{{id}}" readonly>
  </div>
  <div>
    <label for="nombre_microcontrolador">Nombre del Microcontrolador</label>
    <input type="text" name="nombre_microcontrolador" id="nombre_microcontrolador" value="{{nombre_microcontrolador}}" {{isReadOnly}}>
  </div>
  <div>
    <label for="modelo">Modelo</label>
    <input type="text" name="modelo" id="modelo" value="{{modelo}}" {{isReadOnly}}>
  </div>
  <div>
    <label for="fecha_adquisicion">Fecha de Adquisición</label>
    <input type="date" name="fecha_adquisicion" id="fecha_adquisicion" value="{{fecha_adquisicion}}" {{isReadOnly}}>
  </div>
  <div>
    <label for="estado">Estado</label>
    <select name
