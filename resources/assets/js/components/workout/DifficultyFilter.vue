<template>
  <div class="mb-2">
    <p class="text">
      <a class="btn text-wrap filter-collapse" data-toggle="collapse" href="#difficulty-filter-collapse" role="button" aria-expanded="false" aria-controls="filter-collapse-control">Difficulty</a>
      <div class="collapse" id="difficulty-filter-collapse">
        <div class="custom-control custom-radio" v-for="radio in radios">
          <input  class="custom-control-input"
                  :type="type_input"
                  :id="radio.id"
                  :name="name_radio"
                  :value="radio.value"
                  v-model="checked_radio_value"
                  @change="change_filter()">
          <label class="custom-control-label" v-bind:for="radio.id">
            {{ radio.label }}
          </label>
        </div>
      </div>
    </p>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        type_input: 'radio',
        name_radio: 'difficulty-filter',
        radios: [
        {
          id: 'all-difficulty-radio',
          label: 'All difficulty',
          value: 'all',
          checked: true
        },
        {
          id: 'easy-difficulty-radio',
          label: 'Easy',
          value: 'easy',
          checked: false
        },
        {
          id: 'medium-difficulty-radio',
          label: 'Medium',
          value: 'medium',
          checked: false
        },
        {
          id: 'hard-difficultu-radio',
          label: 'Hard',
          value: 'hard',
          checked: false
        },
        {
          id: 'expert-difficulty-radio',
          label: 'Expert',
          value: 'expert',
          checked: false
        }
        ],
        checked_radio_value: 'all'
      }
    },

    created() {
    },

    methods: {
      change_filter(){
        this.$emit('change_filter', { difficulty: this.checked_radio_value });
      }
    },

    computed: {

    }
  }
</script>
