<template>
    <div>
      <div class="modal-backdrop" @click="close"></div>

      <div class="modal-container" >
          <div class="custom-modal" :style="`overflow:${showOverflow==true?'visible':'auto'}`">
              <header class="modal-header">
                  <slot name="header">
                      titulo default
                  </slot>

                  <button type="button" class="btn-close" @click="close">x</button>
              </header>

              <section class="modal-body">
                  <slot name="body">
                      Aqui va el cuerpo
                  </slot>
              </section>

              <footer class="modal-footer">
                  <slot name="footer">
                      este es el footer
                      <button type="button" class="btn-green" @click="close">Close Modal</button>
                  </slot>  
              </footer>
          </div>
      </div>
    </div>
</template>

<style>
  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
  }
  .modal-container {
    pointer-events: none;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2000;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .custom-modal {
    pointer-events: auto;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
   
    display: flex;
    flex-direction: column;
    justify-content: start;
    min-width: 50%;
    max-height: 80vh;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
    border-bottom: 1px solid #eeeeee;
    color: #0753a1;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>

<script>
  export default {
    props:['showOverflow'],
    name: 'Modal',
    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>