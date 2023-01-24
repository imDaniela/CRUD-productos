<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<style>
 .titulo{
    font-size: 2rem;
    font-weight: bold;
    color: rgb(97 97 97/ 80%);
  }

  .header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 5rem;
  }

  .add{
    background-color:  var(--q-color-primary);
    color: white;
    padding: 0.25rem;
    border-radius: 2rem;
    cursor: pointer;
  }

  .plus{
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
  }

  .acciones{
    display: flex;
    justify-content: space-around;
  }

  .edit, .delete{
    width: 1.8rem;
    height: 1.8rem;
    cursor: pointer;
  }

  .delete{
    color: rgb(205, 35, 35);
  }
</style>

<script>
export default {
  name: 'App'
}
</script>
