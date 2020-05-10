<template>
  <div class="col-md-12 card mb-4">
      <a :href="getRecetteHref(recette.id)"> <h4 class="text-center">{{ recette.title }}</h4></a>
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
    },
      methods:{
          getRecetteHref:function(val){
              return 'http://mybooster.com/recette/view/'+val
          }

      }
  }
</script>
