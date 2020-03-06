<template>
  <div>
    <p class="text-wrap" id="recettes-filter-title">Filter</p>
    <repas-filter v-on:change_filter="change_filter"></repas-filter>
    <diet-filter v-on:change_filter="change_filter"></diet-filter>
  </div>
</template>


<script>
  // Import the nested components
  import RepasFilter from './RepasFilter.vue'
  import DietFilter from './DietFilter.vue'

  export default {
    components: {
      'repas-filter': RepasFilter,
      'diet-filter': DietFilter
    },

    data() {
      return {
        filter: {
          repas: 'all',
          diet: 'all'
        }
      }
    },

    methods: {
      change_filter(data) {
        this.filter[Object.keys(data)[0]] = Object.values(data)[0];
        this.$emit('change_filter', this.filter);
      }
    },

    computed: {
    }
  }
</script>
