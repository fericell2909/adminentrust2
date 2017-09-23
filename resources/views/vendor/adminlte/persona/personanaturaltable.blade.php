<table class="table table-hover" id="#tbl-personanatural">
  <thead>
     <tr>
      <th class="text-center" style="vertical-align:middle;">Dni</th>
      <th class="text-center" style="vertical-align:middle;">Correo</th>
      <th class="text-center" style="vertical-align:middle;">Nombres</th>
      <th class="text-center" style="vertical-align:middle;">Estado</th>
      <th class="text-center" style="vertical-align:middle;">Acciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach($personasnataurales as $personasnatural)
    <tr>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$personasnatural->dni}}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$personasnatural->cCorreoElectronico }}</td>
      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">{{$personasnatural->Nombres . ' ' . $personasnatural->cApellidoPaterno . ' ' .$personasnatural->cApellidoMaterno }}</td>
      <td class="color-negro text-center"   style="font-weight:300; vertical-align:middle;">{{$personasnatural->nombre_estado}}</td>

      <td class="color-negro text-center" style="font-weight:300; vertical-align:middle;">
       		<div>
            <a href="{{url('PersonaNatural/Ver') . '/' . $personasnatural->id }}" class="btn btn-default btn-info"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;</a>
            <a href="{{url('PersonaNatural/Editar') . '/' . $personasnatural->id }}" class="btn btn-danger"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;</a>
          <div>
      </td> 
    </tr>
  @endforeach
  </tbody>  
</table>
{!!$personasnataurales->render()!!}    