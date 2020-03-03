<template>
  <div>
    <p class="text-wrap" id="workouts-filter-title">Filter</p>
    <focus-filter v-on:change_filter="change_filter"></focus-filter>
    <type-filter v-on:change_filter="change_filter"></type-filter>
    <difficulty-filter v-on:change_filter="change_filter"></difficulty-filter>
  </div>
</template>


<script>
  // Import the nested components
  import FocusFilter from "./FocusFilter.vue"
  import TypeFilter from "./TypeFilter.vue"
  import DifficultyFilter from "./DifficultyFilter.vue"

  export default {
    components: {
      'focus-filter': FocusFilter,
      'type-filter': TypeFilter,
      'difficulty-filter': DifficultyFilter
    },

    data() {
      return {
        filter: {
          focus: 'all',
          type: 'all',
          difficulty: 'all'
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
