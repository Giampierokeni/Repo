<h2>Listado de Microcontroladores</h2>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Modelo</th>
        <th>Fecha de Adquisición</th>
        <th>Estado</th>
        <th><a href="index.php?page=Microcontroladores_MicrocontroladoresForm&mode=INS&id=0">Nuevo</a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach microcontroladores}}
      <tr>
        <th>{{id}}</th>
        <th><a href="index.php?page=Microcontroladores_MicrocontroladoresForm&mode=DSP&id={{id}}">{{nombre_microcontrolador}}</a></th>
        <th>{{modelo}}</th>
        <th>{{fecha_adquisicion}}</th>
        <th>{{estado}}</th>
        <th>
          <a href="index.php?page=Microcontroladores_MicrocontroladoresForm&mode=UPD&id={{id}}">Editar</a>
          &nbsp;
          <a href="index.php?page=Microcontroladores_MicrocontroladoresForm&mode=DEL&id={{id}}">Eliminar</a>
        </th>
      </tr>
      {{endfor microcontroladores}}
    </tbody>
  </table>
</section>
