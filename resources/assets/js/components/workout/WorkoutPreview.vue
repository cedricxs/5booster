<template>
  <div class="col-md-12 card mb-4">
      <a :href="getWorkoutHref(workout.id)"> <h4 class="text-center">{{ workout.title }}</h4></a>
    <p class="text-center">{{ workout.focus }}</p>
    <p class="text-center">{{ workout.type }}</p>
    <p class="text-center">{{ workout.difficulty }}</p>
  </div>
</template>

<script>
  export default {

    props: ['workout'],

    data() {
      return {
      }
    },
    methods:{
        getWorkoutHref:function(val){
            return 'http://mybooster.com/workout/'+val
        }

    }

  }
</script>
