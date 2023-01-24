<template>
  <div class="q-pa-md">
    <div class="header">
      <h4 class="titulo">Lista de Variaciones del Producto</h4>

      <!-- <router-link to="/add_producto">
        <div class="add">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="plus">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </div>
      </router-link> -->
    </div>

    <q-markup-table>
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Producto</th>
          <th class="text-center">Referencia</th>
          <th class="text-center">Descripcion</th>
          <th class="text-center">Precio (USD)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(variacion, index) in variaciones" :key="variacion.id">
          <td class="text-center">{{ index + 1 }}</td>
          <td class="text-center">{{ variacion.producto.nombre }}</td>
          <td class="text-center">{{ variacion.referencia }}</td>
          <td class="text-center">{{ variacion.descripcion }}</td>
          <td class="text-center">{{ variacion.precio }}</td>
        </tr>
      </tbody>
    </q-markup-table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data(){
    return{
      variaciones: [],
    };
  },

  created(){
    this.GetVariaciones()
  },

  methods:{
    //Get Productos
    GetVariaciones(){
       axios
        .get("http://localhost:8000/api/variaciones")
        .then((response) => {
          this.variaciones = response.data;
        });
    },
  }
}
</script>
