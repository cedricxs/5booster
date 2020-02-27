<template>
  <div class="card">
    <h3 class="text-center">Type Filter</h3>
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
</template>


<script>
  export default {
    data() {
      return {
        type_input: 'radio',
        name_radio: 'type-filter',
        radios: [
          {
            id: 'all-type-radio',
            label: 'All type',
            value: 'all',
            checked: true
          },
          {
            id: 'cardio-radio',
            label: 'Cardio',
            value: 'cardio',
            checked: false
          },
          {
            id: 'strength-radio',
            label: 'Strength',
            value: 'strength',
            checked: false
          },
          {
            id: 'power-radio',
            label: 'Power',
            value: 'power',
            checked: false
          },
          {
            id: 'function-radio',
            label: 'Function',
            value: 'function',
            checked: false
          }
        ],
        checked_radio_value: 'all'
      }
    },

    created() {
    },

    methods: {
      change_filter(event) {
        this.$emit('change_filter', { type: this.checked_radio_value });
      }
    },

    computed: {
      test() {
        console.log('a');
      }
    }
  }
</script>
