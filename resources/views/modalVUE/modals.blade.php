<!-- Modal -->

<form method="POST" v-on:submit.prevent="createPacientes">
<div class="modal fade" id="nuevoPaciente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del nuevo paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
     <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="dni">DNI</label>
             <input type="number" name="dni" class="form-control" v-model="dni">
            <span v-for="error in errors" class="text-danger">@{{ error.dni }}</span>    
          </div>
          </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="hcnum">Historia clínica</label>
            <input type="number" name="hcnum" class="form-control" v-model="hcnum">
            <span v-for="error in errors" class="text-danger">@{{ error.hcnum }}</span>       </div>
          </div>
       </div>

      <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="apellido">Apellido</label>
             <input type="text" name="apellido" class="form-control" v-model="apellido">
            <span v-for="error in errors" class="text-danger">@{{ error.apellido }}</span>    
          </div>
          </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" v-model="nombre">
            <span v-for="error in errors" class="text-danger">@{{ error.nombre }}</span>       </div>
          </div>
       </div>

       <div class="row">
          <div class="col-md-6">
           <div class="form-group">
          
            <label for="genero">Género</label>
            <br>
            <input type="radio" id="genero" value="Masculino" v-model="genero">
              <label for="Masculino">Masculino</label>
              <input type="radio" id="genero" value="Femenino" v-model="genero">
              <label for="Femenino">Femenino</label>
              <br>
               <span v-for="error in errors" class="text-danger">@{{ error.genero }}</span>
             
             
          </div>
          </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" v-model="fecha_nacimiento">
            <span v-for="error in errors" class="text-danger">@{{ error.fecha_nacimiento }}</span>       </div>
          </div>
       </div>

       <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="edad">Edad</label>
             <input type="number" name="edad" class="form-control" v-model="edad">
            <span v-for="error in errors" class="text-danger">@{{ error.edad }}</span>    
          </div>
          </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="obra_social">Obra social</label>
            <input type="text" name="obra_social" class="form-control" v-model="obra_social">
            <span v-for="error in errors" class="text-danger">@{{ error.obra_social }}</span>       </div>
          </div>
       </div>

       <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="localidad">Localidad</label>
             <input type="text" name="localidad" class="form-control" v-model="localidad">
            <span v-for="error in errors" class="text-danger">@{{ error.localidad }}</span>    
          </div>
          </div>

        <div class="col-md-6">
           <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" name="provincia" class="form-control" v-model="provincia">
            <span v-for="error in errors" class="text-danger">@{{ error.provincia }}</span>       
          </div>
          </div>
       </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <input  type="submit" class="btn btn-success" value="Guardar">
      </div>
    </div>
  </div>
</div>
</form>