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
        console.log('created');
        this.recettes = [
          {
            id: 1,
            title: 'Super Recette 1',
            url_preview: '',
            url_recette: '',
            repas: 'breakfast',
            diet: 'vegan'
          },
          {
            id: 2,
            title: 'Super Recette 2',
            url_preview: '',
            url_recette: '',
            repas: 'lunch',
            diet: 'pork-free'
          },
          {
            id: 3,
            title: 'Super Recette 3',
            url_preview: '',
            url_recette: '',
            repas: 'tea',
            diet: 'gluten-free'
          },
          {
            id: 4,
            title: 'Super Recette 4',
            url_preview: '',
            url_recette: '',
            repas: 'diner',
            diet: 'vegetarian'
          },
          {
            id: 5,
            title: 'Super Recette 5',
            url_preview: '',
            url_recette: '',
            repas: 'diner',
            diet: 'lactose-free'
          }
        ]
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
