<template>
  <div class="row">

    <!-- Recette component -->
    <div class="col-7 offset-1">
      <h2 class="text-center" id="recettes-global-preview-title">Recettes</h2>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4" v-for="recette in filtered_recettes">
          <recette-preview v-bind:recette="recette"></recette-preview>
        </div>
      </div>
    </div>
    <!-- Recette component -->

    <!-- Filter component -->
    <div class="col-3 offset-1" id="recettes-filter-container">
      <recette-filter v-on:change_filter="update_filter"></recette-filter>
    </div>
    <!-- Filter component -->

  </div>
</template>

<script>
  // Import nested components
  import RecettePreview from "./RecettePreview.vue"
  import Filter from "./Filter.vue"

  const all = 'all';

  export default {

    components: {
      'recette-preview': RecettePreview,
      'recette-filter': Filter
    },

    data() {
      return {
        recettes: [],
        recette: {
          id: '',
          title: '',
          url_preview: '',
          url_recette: '',
          repas: '',
          diet: ''
        },
        filter: {
          repas: all,
          diet: all
        }
      }
    },

    created() {
      this.fetchRecettes();
    },

    methods: {
      fetchRecettes() {
          // Request from API here
          fetch("/api/recettes").then(res => res.json().then(data=>data.forEach(recette=>this.recettes.push(recette))));

      },

      update_filter(data) {
        this.filter = data;
      }
    },

    computed: {
      filtered_recettes() {
        return this.recettes.filter( recette => {
          const { repas, diet } = this.filter;
          const allRepas = repas === "all";
          const allDiet = diet === "all";

          return (allRepas || recette.repas === repas)
              && (allDiet || recette.diet === diet);
        });
      }
    }
  }
</script>
