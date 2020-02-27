<template>
  <div>
    <h3 class="text-center">{{ workout.title }}</h3>
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
