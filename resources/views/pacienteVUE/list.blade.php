

@include('layoutsVUE/header')
@include('layoutsVUE/sidebar')
@include('layoutsVUE/nav')

 <div class="content">
                

 <div class="container-fluid">

  
  <div class="row">
         <div class="col-md-12">
  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#nuevoPaciente">
  Nuevo paciente </a>

          </div>
   </div>

          
    <div id="crud" class="row">
       <!-- id crud javascript en vue -->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Lista de pacientes</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                     <table cltablaass="table">

                       <thead>
                        <tr>

                          <td width="100px">Apellido</td>
                          <td width="100px" >Nombre</td>
                          <td  width="100px">Edad</td>
                          <td  width="100px">DNI</td>
                          <td width="100px">Obra social</td>
                          <td></td>
                          <td></td>

                        </tr>
                      </thead>
                      <tbody>
                           <tr v-for="pac in pacientes"> 
                            <!-- v-for recorrer el array con VUE -->
                              <td> @{{ pac.apellido }} </td>
                              <td> @{{ pac.nombre }} </td>
                              <td> @{{ pac.edad }}  </td>
                              <td> @{{ pac.dni }} </td>
                              <td> @{{ pac.obra_social }} </td>
                              <td> <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editPacientes(pac)"> Editar</a> </td>
                              <td> <a href="#" class="btn btn-info btn-sm" v-on:click.prevent="deletePacientes(pac)"> Eliminar</a> </td>

                              <!-- v-on:click hace refencia al metedo eliminar pacientes en app.js .prevent permite que no se racargue la pagina una vez eliminado el paciente -->
                            



                            </tr>


                      </tbody>     

          

        
                    </table>

                      <!-- paginacion con vuejs -->
                    <nav>
                      <ul class="pagination">
                       
                         <li v-if="pagination.current_page > 1" >
                         <!-- si la pagina actual es mayor a 1 que pueda volver a atras -->
                            <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                              <!-- el boton atras llama al metodo creado y le pasa el parametro
                              pagina actual menos uno ej si la pagina es 5 le pasa la pagina 4 -->
                               <span>Atras</span>
                             </a>
                         </li>
 
                          <li v-for="page in pagesNumber" v-bind:class="[ page == isActive ? 'active' : '']">

                           <!--  preguntar si la pagina es la pagina actual , si es verdadero de la asigna la clase active (clase de boostrap) si no vacio
 -->

                            <a href="#" @click.prevent="changePage(page)">

                              <!-- @click.prevent evitar que recargue la pagina -->
                              
                             @{{ page }}

                            </a>
                          </li>

                          <li  v-if="pagination.current_page < pagination.last_page">
                              <!-- si la pagina actual es menor a la ultima pagina que el boton siguiente
                              aparezca  -->
                            <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                               <!-- el boton atras llama al metodo creado y le pasa el parametro
                              pagina actual menos uno ej si la pagina es 5 le pasa la pagina 4 -->    
                                <span> Siguiente </span>

                              </a>
                           </li>

                      </ul>


                    </nav>

                    @include('modalVUE/modals')
                    @include('modalVUE/editmodals')


                  </div>
                </div>
              </div>
            </div>

 

          </div>




        </div>

      </div>

     <!-- script en VUEjs  -->
     <script src="{{ asset('js/app.js') }}"></script>
         
 