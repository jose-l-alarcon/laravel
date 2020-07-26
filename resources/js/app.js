// aqui codigo javascript (vue) que se ejecutara 	
// se enlazara en la vista que se ejecute 

new Vue({
  el: '#crud',
	// id hace referencia a la tabla pacientes
	created: function() {
		this.getdatos();
	},
	// llamar a la funcion getdatos(), carga la lista de pacientes
  
    
    // encapsular los datos del paciente en la variable data
   data: {
     pacientes: [],
     // variable que trae todos los datos del paciente

     // variables para paginar registros de la tabla , estas variables tambien deben estar 
     // en el controlador para realizar la consulta, metodo paginate de laravel
     pagination: {
            'total': 0,       
            'current_page': 0, 
            'per_page': 0,      
            'last_page': 0,    
            'from': 0,          
            'to': 0           
  
     },


     dni: '',
     hcnum: '',
     apellido: '',
     nombre: '',
     genero: '',
     fecha_nacimiento: '',
     edad: '',
     obra_social: '',
     localidad: '',
     provincia: '',
     // crear variables vacias para crear nuevo paciente

      fillPaciente: {'idpaciente':'','dni':'','hcnum':'','apellido':'','nombre':'',
      'genero':'','fecha_nacimiento':'','edad':'','obra_social':'','localidad':'',
      'provincia':''},
    // esta variable nps permite cargar los datos del paciente en el modal para 
     // luego actualizar, en el se define todas las variables de la tabla pacientes

     errors: [],
     // variable para mostrar en el formulario cuando exista un campo vacio etc
     offset: 2,


   }, 
 
   // aqui se crean las funciones para la paginacion 
   computed: {
    // indica la pagina que esta activa, marcando con un color 
    isActive: function(){
     return this.pagination.current_page;
    },
    // calcula en numero de registro por pagina
    pagesNumber: function() {
     
     // si la variable to esta en 0 retornamos un array vacio
      if(!this.pagination.to){
        return [];
      }

      // from= desde la pagina , to=hasta
      // from es igual a la pagina actual - 
      var from = this.pagination.current_page - this.offset; 
      // preguntar si desde es negativo , no se puede paginar 
      // desde la pagina 0 , si la resta es negativa la variable va a ser igual a 1
      if(from < 1){
        from = 1;
      }

      
      var to = from + (this.offset * 2); 

      // si la ultima pagina es mayor igual a la ultima
      // entonces to es igual a la ultima pagina
      if(to >= this.pagination.last_page){
        to = this.pagination.last_page;
      }

       // calcular la numeracion exacta 
      var pagesArray = [];

      while(from <= to){
        // push para ingresar datos 
        // ej 5 <= 10 primer elemento insertado es el 5
        pagesArray.push(from);
        from++;
        // iterar
      }
      return pagesArray;
    }

  },


   // metodo CRUD del paciente (listar, eliminar, editar, crear, paginar)
    methods : {
       getdatos: function(page) {

       	   var urldatos = 'pacientesvue?page='+page;

       	    // variable con la ruta index definida en el controlador 
       	    //peticion mediante axios con la respuesta 
       	   axios.get(urldatos).then( response => {
             this.pacientes = response.data.pacientesvue.data,
             this.pagination = response.data.pagination

       	   });


       },
      
       // con este metodo se cargan los datos del paciente en el modal 
       editPacientes : function(pac){
        // llenar los campos con los valores del paciente,
        // estos campos son los definidos en en modal para editar

        // pac es la variable que trae todos los datos del paciente
        // esta variable se la pasa por el boton editar en la tabla de paciente
        this.fillPaciente.idpaciente = pac.idpaciente;
        this.fillPaciente.dni = pac.dni;
        this.fillPaciente.hcnum = pac.hcnum;
        this.fillPaciente.apellido = pac.apellido;
        this.fillPaciente.nombre = pac.nombre;
        this.fillPaciente.genero = pac.genero;
        this.fillPaciente.fecha_nacimiento = pac.fecha_nacimiento;
        this.fillPaciente.edad = pac.edad;
        this.fillPaciente.obra_social = pac.obra_social;
        this.fillPaciente.localidad = pac.localidad;
        this.fillPaciente.provincia = pac.provincia;
          
         // abrir la ventana modal de editar paciente
         $('#editPacientes').modal('show');

       },
          
        // con este metodo actualizamos los datos de la ventana modal 
         updatePacientes: function (idpaciente){

           var urlupdate = 'pacientesvue/' + idpaciente;

           axios.put(urlupdate,this.fillPaciente).then( response => {
              // axios.put pasa la url y la variable que contiene todos los campos
              // de la tabla paciente, esta variable se definio en data
              this.getdatos();
               // si la respuesta es correcta se refresca la lista llamando 
              // al metodo getdatos con la tabla actualizada, 

              // una vez que se guardan los datos vaciar las cajas de textos
               this.fillPaciente = {'idpaciente':'','dni':'','hcnum':'','apellido':'','nombre':'',
              'genero':'','fecha_nacimiento':'','edad':'','obra_social':'','localidad':'',
              'provincia':''};

              // limpiar los errores del formulario
              this.errors = [];

              // ocultar la ventana modal una vez que se atualizan los datos
              $('#editPacientes').modal('hide');
              toastr.success('El paciente se actualizado correctamente');
           }).catch( error => {
               this.errors = error.response.data

           });


          },




       deletePacientes: function(pac){
              var urldetele = 'pacientesvue/' + pac.idpaciente;
              // url para eliminar paciente se concatena con el id del paciente 
              // a eliminar 
               axios.delete(urldetele).then( response => {
                  this.getdatos();
                  // refrescar los datos , cargando la lista sin el paciente 
                  // que se elimino
                  toastr.success('Paciente eliminado correctamente');
                  // mensaje con la leyenda de exito
                  

               });
     
          },

         createPacientes: function (){
           var urlCreate = 'pacientesvue';

           axios.post(urlCreate,{
           // petecion con axios . metodo post con la variables a guardar
             dni: this.dni,
             hcnum: this.hcnum,
             apellido: this.apellido,
             nombre: this.nombre,
             genero: this.genero,
             fecha_nacimiento: this.fecha_nacimiento,
             edad: this.edad,
             obra_social: this.obra_social,
             localidad: this.localidad,
             provincia: this.provincia,
  
             


           }).then( response => {
              // si la respuesta es correcta se refresca la lista llamando 
              // al metodo getdatos
              this.getdatos();

              // una vez que se guardan los datos vaciar las cajas de textos
              this.dni = '';
              this.hcnum = '';
              this.apellido = '';
              this.nombre = '';
              this.genero = '';
              this.fecha_nacimiento = '';
              this.edad = '';
              this.obra_social = '';
              this.localidad = '';
              this.provincia = '';

              // limpiar los errores del formulario
              this.errors = [];
              // ocultar la ventana modal 
              $('#nuevoPaciente').modal('hide');
              toastr.success('El paciente se agrego correctamente');
           }).catch( error => {
               this.errors = error.response.data

           });


          },

           // crear metodo cambiar de pagina
           changePage: function(page){

            // recibe el parametro de la pagina a cual queremos
            // cambiar
            this.pagination.current_page = page;
            // listar el nuevo numero de pacientes
            // nuevo listado de pacientes con paginacion
            this.getdatos(page);

           }


        

    }


});