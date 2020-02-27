<template>
  <div class="col-5">
    <h2>Workouts</h2>
    <div class="card card-body" v-for="workout in workouts" v-bind:key="workout.id">
      <h3>{{ workout.title }}</h3>
      <p>{{ workout.focus }}</p>
      <p>{{ workout.focus }}</p>
      <p>{{ workout.difficulty }}</p>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        workouts: [],
        workout: {
          id: '',
          title: '',
          url_preview: '',
          url_workout: '',
          focus: [],
          type: [],
          difficulty: ''
        },
        workout_id: '',
        pagination: {},
        edit: false
      }
    },

    created() {
      this.fetchWorkouts();
    },

    methods: {
      fetchWorkouts() {
        // Request from API here
        // this.articles = res.data;
        console.log('Attempt to fetch the workouts');
        this.workouts = [
          {
            id: 1,
            title: 'Super Workout 1',
            url_preview: '',
            url_workout: '',
            focus: ['upper-body'],
            type: ['cardio'],
            difficulty: 'easy'
          },
          {
            id: 2,
            title: 'Super Workout 2',
            url_preview: '',
            url_workout: '',
            focus: ['upper-body'],
            type: ['cardio'],
            difficulty: 'easy'
          },
          {
            id: 3,
            title: 'Super Workout 3',
            url_preview: '',
            url_workout: '',
            focus: ['lower-body'],
            type: ['mass'],
            difficulty: 'easy'
          },
          {
            id: 4,
            title: 'Super Workout 4',
            url_preview: '',
            url_workout: '',
            focus: ['core-body'],
            type: ['cardio'],
            difficulty: 'easy'
          },
          {
            id: 5,
            title: 'Super Workout 5',
            url_preview: '',
            url_workout: '',
            focus: ['upper-body'],
            type: ['mass'],
            difficulty: 'easy'
          },
          {
            id: 6,
            title: 'Super Workout 6',
            url_preview: '',
            url_workout: '',
            focus: ['upper-body'],
            type: ['strength'],
            difficulty: 'easy'
          },
          {
            id: 7,
            title: 'Super Workout 7',
            url_preview: '',
            url_workout: '',
            focus: ['lower-body'],
            type: ['power'],
            difficulty: 'easy'
          }
        ];
        console.log(this.workouts);
      }
    },

    computed: {

    }
  }
</script>
