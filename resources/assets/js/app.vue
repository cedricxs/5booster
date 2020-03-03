<template>
  <div class="col-10">
    <workouts></workouts>
  </div>
</template>

<script>
  // Imports
  import Workouts from "./components/workout/Workouts.vue"

  export default {
    components: {
      'workouts': Workouts
    }
  }

</script>
