<template>
  <div class="mb-2">
    <p class="text">
      <a class="btn text-wrap filter-collapse" data-toggle="collapse" href="#diet-filter-collapse" role="button" aria-expanded="false" aria-controls="filter-collapse-control">Diet</a>
      <div class="collapse" id="diet-filter-collapse">
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
        name_radio: 'diet-filter',
        radios: [
          {
            id: 'all-diet-radio',
            label: 'All diet',
            value: 'all'
          },
          {
            id: 'vegan-diet-radio',
            label: 'Vegan',
            value: 'vegan'
          },
          {
            id: 'vegetarian-diet-radio',
            label: 'Vegetarian',
            value: 'vegetarian'
          },
          {
            id: 'pork-free-radio-radio',
            label: 'Pork free',
            value: 'pork-free'
          },
          {
            id: 'lactose-free-radio-radio',
            label: 'Lactose free',
            value: 'lactose-free'
          },
          {
            id: 'gluten-free-radio-radio',
            label: 'Gluten free',
            value: 'gluten-free'
          }
        ],
        checked_radio_value: 'all'
      }
    },

    created() {
    },

    methods: {
      change_filter(event) {
        this.$emit('change_filter', { diet: this.checked_radio_value });
      }
    },

    computed: {
    }
  }
</script>
