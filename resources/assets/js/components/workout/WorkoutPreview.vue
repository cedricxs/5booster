<template>
  <div class="col-md-12 card mb-4">
    <h4 class="text-center">{{ workout.title }}</h4>
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
    }

  }
</script>
