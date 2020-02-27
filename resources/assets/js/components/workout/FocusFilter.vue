<template>
  <div class="card">
    <h3 class="text-center">Focus Filter</h3>
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
        name_radio: 'focus-filter',
        radios: [
          {
            id: 'all-focus-radio',
            label: 'All focus',
            value: 'all'
          },
          {
            id: 'upper-body-radio',
            label: 'Upper body',
            value: 'upper-body'
          },
          {
            id: 'core-body-radio',
            label: 'Core',
            value: 'core'
          },
          {
            id: 'lower-body-radio',
            label: 'Lower body',
            value: 'lower-body'
          }
        ],
        checked_radio_value: 'all'
      }
    },

    created() {
    },

    methods: {
      change_filter(event) {
        this.$emit('change_filter', { focus: this.checked_radio_value });
      }
    },

    computed: {
    }
  }
</script>
