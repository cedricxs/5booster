<template>
  <div class="mb-2">
    <p class="text">
      <a class="btn text-wrap filter-collapse" data-toggle="collapse" href="#repas-filter-collapse" role="button" aria-expanded="false" aria-controls="filter-collapse-control">Repas</a>
      <div class="collapse" id="repas-filter-collapse">
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
        name_radio: 'repas-filter',
        radios: [
          {
            id: 'all-repas-radio',
            label: 'All repas',
            value: 'all'
          },
          {
            id: 'breakfast-repas-radio',
            label: 'Breakfast',
            value: 'breakfast'
          },
          {
            id: 'lunch-repas-radio',
            label: 'Lunch',
            value: 'lunch'
          },
          {
            id: 'tea-repas-radio',
            label: 'Tea',
            value: 'tea'
          },
          {
            id: 'diner-repas-radio',
            label: 'Diner',
            value: 'diner'
          }
        ],
        checked_radio_value: 'all'
      }
    },

    created() {
    },

    methods: {
      change_filter(event) {
        this.$emit('change_filter', { repas: this.checked_radio_value });
      }
    },

    computed: {
    }
  }
</script>
