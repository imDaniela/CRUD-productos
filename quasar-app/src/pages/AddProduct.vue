<template>
  <div class="q-pa-md">
    <div class="container">
      <div>
        <h4 class="titulo">Lista de Productos</h4>
      </div>

      <div class="container_inputs">
        <div class="input">
          <q-input class="input-modified" outlined v-model="nombre" label="Nombre" />
        </div>

        <div class="input">
          <q-input class="input-modified" outlined v-model="referencia" label="Referencia" />
        </div>

        <div class="input">
          <q-input class="input-modified" outlined v-model="descripcion" label="Descripción" />
        </div>

        <div class="input">
          <q-input class="input-modified" outlined v-model="precio" label="Precio" />
        </div>
      </div>

      <!-- <div class="add_button">
        <div class="add" @click="AddProducto()">{{id != null ?'Editar':'Agregar'}}</div>
      </div>    -->
      <template v-if="id != null">
        <div style="display: flex; justify-content: space-around; height: 3rem; align-items: center;">
          <h4 class="titulo">Variaciones del Producto descrito</h4>

          <div class="add_variacion" @click="showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="plus">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
          </div>
        </div>

        <q-markup-table>
          <thead>
            <tr>
              <th class="text-center">Referencia</th>
              <th class="text-center">Descripcion</th>
              <th class="text-center">Precio (USD)</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(variacion) in variaciones" :key="variacion.id">
              <td class="text-center">{{ variacion.referencia }}</td>
              <td class="text-center">{{ variacion.descripcion }}</td>
              <td class="text-center">{{ variacion.precio }}</td>
              <td class="text-center">
                <div class="acciones">
                  <div class="edit" @click="EditFila(variacion)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                  </div>

                  <div class="delete" @click="DeleteVariacion(variacion.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </q-markup-table>
      </template>

      <div class="add_button">
        <div class="add" @click="AddProducto()">{{id != null ?'Editar':'Agregar'}}</div>
      </div>   
    </div> 

    <modal v-show="isModalVisible" @close="closeModal()">
      <template v-slot:header> Variacion del producto </template>

      <template v-slot:body>
        <div class="modal_input">
          <div class="input">
            <q-input class="input-modified" outlined v-model="fila.referencia" label="Referencia" />
          </div>

          <div class="input">
            <q-input class="input-modified" outlined v-model="fila.descripcion" label="Descripción" />
          </div>

          <div class="input">
            <q-input class="input-modified" outlined v-model="fila.precio" label="Precio" />
          </div>
        </div>
      </template>

      <template v-slot:footer>
        <button
          v-if="!edit"
          @click="AddFila()"
        >
          Agregar
        </button>
         <button
          v-else
          @click="closeModal()"
        >
          Editar
        </button>
      </template>
    </modal>
  </div>
</template>

<style scoped>
  .titulo{
    text-align: center;
  }

  .container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    border: 1px solid gray;
  }

  .container_inputs, .modal_input{
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  @media(min-width: 768px){
    .container_inputs{
      flex-direction: row;
      justify-content: space-around;
      align-items: center;
      margin: 1rem;
      flex-wrap: wrap;
    }
  }

  .input{
    margin: 1.3rem;
  }

  .input-modified{
    width: 18rem;
  }

  .add_button{
    display: flex;
    justify-content: center;
  }

  .add{
    background-color:  var(--q-color-primary);
    color: white;
    padding: 0.8rem 0.8rem;
    border-radius: 1rem;
    cursor: pointer;
    width: 8rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-top: 2rem;
    margin-bottom: 1rem;
  }

  .add_variacion{
    cursor: pointer;
    border: 1px solid gray;
    border-radius: 2rem;
  }
</style>

<script>
import { ref } from 'vue';
import axios from "axios";
import modal from "components/Modal.vue";

const Swal = require("sweetalert2");

export default {
  setup () {
    return {
      text: ref('')
    }
  },

  data(){
    return {
      //v-models del producto
      id: null,
      nombre: '',
      referencia: '',
      descripcion: '',
      precio: '',

      //Array de variaciones y json que conformara el array
      variaciones: [], 
      fila:{
        id: '',
        referencia: '',
        descripcion: '',
        precio: '',
      },

      edit: false, //Variable para editar la tabla de variaciones
      isModalVisible: false, //Modal
    }
  },

  created(){
    if(this.$route.query.id){ //Si el parametro "id" de la ruta actual es difernete null llama las funciones siguientes
      this.GetProducto(this.$route.query.id);
      this.GetVariacionesByProductoId(this.$route.query.id);
    }
  },

  methods: {
    //Registrar producto t variaciones del mismo
    AddProducto(){
      axios
          .post('http://localhost:8000/api/save_producto',
            {
              'id': this.id,
              'nombre': this.nombre,
              'referencia': this.referencia,
              'descripcion': this.descripcion,
              'precio': this.precio,
              'variaciones': this.variaciones
            })
          .then(response => {
            let title = ''
            let text = '';

            if(this.id == null){
              title = "Registrado!";
              text = "Nuevo producto agregado con exito";
            }else{
              title = "Editado!";
              text = "El producto ha sido editado con exito";
            }

            Swal.fire({
              title: title,
              text: text,
              icon: "success",
            }).then((result) => {
              this.$router.push('/');
            });
          })
    },

    //Obtiene producto particular segun su id
    GetProducto(id){
       axios
        .get(`http://localhost:8000/api/producto/${id}`)
        .then((response) => {
          this.id = response.data.id;
          this.nombre = response.data.nombre;
          this.referencia = response.data.referencia;
          this.descripcion = response.data.descripcion;
          this.precio = response.data.precio;
        });
    },

    //Obtiene variaciones del producto segun el producto_id
    GetVariacionesByProductoId(id){
       axios
        .get(`http://localhost:8000/api/variaciones/${id}`)
        .then((response) => {
          this.variaciones = response.data.variaciones;
        });
    },

    //Elimina el elmento de la lista de variaciones del producto descrito
    DeleteVariacion(id){
      Swal.fire({
          title: "Esta seguro que desea eliminar este elmento de la lista?",
          icon: "alert",
          showCancelButton: true,
          cancelButtonText: "Cancelar",
          confirmButtonText: "Confirmar"
      }).then((result) => {
          if (result.isConfirmed) {
            this.variaciones.splice(id,1);
            axios.get(`http://localhost:8000/api/delete_variacion/${id}`);
            this.GetVariacionesByProductoId(this.$route.query.id);
          }
      });
    }, 

    //Agregar una fila a la tabla de variaciones ya que un producto puede tener mas de una variacion
    AddFila(){
      this.edit = false;
      this.variaciones.push(this.fila);
      console.log(this.variaciones)
      this.closeModal();
    },

    //Editar fila seleccionada de las variaciones
    EditFila(elemento) {
      this.fila = elemento;
      this.edit = true;
      this.showModal();
    },

    //MOSTRAR Y CERRAR MODAL
    showModal() {
      this.isModalVisible = true;
    },

    closeModal() {
      this.isModalVisible = false;
      this.fila = {
        variacion_referencia: '',
        variacion_descripcion: '',
        variacion_precio: '',
      };
    },
  },

  components: {
    modal,
  },
}
</script>

