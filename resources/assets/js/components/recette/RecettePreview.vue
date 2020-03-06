<template>
  <div class="col-md-12 card mb-4">
    <h4 class="text-center">{{ recette.title }}</h4>
    <p class="text-center">{{ recette.repas }}</p>
    <p class="text-center">{{ recette.diet }}</p>
  </div>
</template>

<script>
  export default {

    props: ['recette'],

    data() {
      return {

      }
    }
  }
</script>
