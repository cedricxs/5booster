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
        this.workouts = [
          {
            id: 1,
            title: 'Super Workout 1',
            url_preview: '',
            url_workout: '',
            focus: 'upper-body',
            type: 'cardio',
            difficulty: 'easy'
          },
          {
            id: 2,
            title: 'Super Workout 2',
            url_preview: '',
            url_workout: '',
            focus: 'upper-body',
            type: 'cardio',
            difficulty: 'easy'
          },
          {
            id: 3,
            title: 'Super Workout 3',
            url_preview: '',
            url_workout: '',
            focus: 'lower-body',
            type: 'mass',
            difficulty: 'easy'
          },
          {
            id: 4,
            title: 'Super Workout 4',
            url_preview: '',
            url_workout: '',
            focus: 'core-body',
            type: 'cardio',
            difficulty: 'easy'
          },
          {
            id: 5,
            title: 'Super Workout 5',
            url_preview: '',
            url_workout: '',
            focus: 'upper-body',
            type: 'mass',
            difficulty: 'easy'
          },
          {
            id: 6,
            title: 'Super Workout 6',
            url_preview: '',
            url_workout: '',
            focus: 'upper-body',
            type: 'strength',
            difficulty: 'easy'
          },
          {
            id: 7,
            title: 'Super Workout 7',
            url_preview: '',
            url_workout: '',
            focus: 'lower-body',
            type: 'power',
            difficulty: 'easy'}];
        // Temp solution without fectch API
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
