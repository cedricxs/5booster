require('./bootstrap');

// Vue.component(
//   'login',
//   require('./components/Login.vue')
// )
//
// const app = new Vue({
//   el: #app
// });


import WorkoutPreview from "./components/WorkoutPreview.vue"
import Workouts from "./components/Workouts.vue"
import Vue from "vue"

new Vue({
  el: "#container",
  components: {
    'workout-preview': WorkoutPreview,
    'workouts': Workouts
  }
});
