<template>
  <div class="row">

    <!-- Workout display -->
    <div class="col-7 card offset-1">
      <h2 class="text-center card">Workouts</h2>
      <div class="row">
        <div class="card card-body" v-for="workout in filtered_workouts">
          <workout-preview v-bind:workout="workout"></workout-preview>
        </div>
      </div>
    </div>
    <!-- Workout display -->

    <!-- Filter display -->
    <div class="col-3 card">
      <workout-filter v-on:change_filter="update_filter"></workout-filter>
    </div>
    <!-- Filter display -->

  </div>
</template>

<script>
  // Import the nested components
  import WorkoutPreview from "./WorkoutPreview.vue"
  import Filter from "./Filter.vue"

  export default {
    components: {
      'workout-preview': WorkoutPreview,
      'workout-filter': Filter
    },

    data() {
      return {
        workouts: [],
        workout: {
          id: '',
          title: '',
          url_preview: '',
          url_workout: '',
          focus: '',
          type: '',
          difficulty: ''
        },
        workout_id: '',
        pagination: {},
        filter: {
          focus: 'all',
          type: 'all',
          difficulty: 'all'
        }
      }
    },

    created() {
      this.fetchWorkouts();
    },

    methods: {
      fetchWorkouts() {
        // Request from API here
          fetch("/api/workouts").then(res => res.json().then(data=>data.forEach(workout=>this.workouts.push(workout))));
      },

      update_filter(data) {
        this.filter = data;
      }
    },

    computed: {
      filtered_workouts() {
        return this.workouts.filter(workout => {
          const { focus, type, difficulty } = this.filter;
          const allFocus = focus === "all";
          const allType = type === "all";
          const allDifficulty = difficulty === "all";

         return (allType || workout.type === type)
             && (allFocus || workout.focus === focus)
             && (allDifficulty || workout.difficulty === difficulty);
      });
      }
    }
  }
</script>
