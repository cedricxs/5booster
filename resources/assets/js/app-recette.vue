<template>
  <div class="col-md-10">
    <recettes></recettes>
  </div>
</template>

<script>
  // Imports
  import Recettes from "./components/recette/Recettes.vue"

  export default {
    components: {
      'recettes': Recettes
    }
  }

</script>
