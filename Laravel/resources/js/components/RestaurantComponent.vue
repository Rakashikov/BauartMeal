<template>
  <div class="restaurant__container">
    <div class="restaurant__link">Link: {{ restaurant.link }}</div>
    <div class="restaurant__name">Name: {{ restaurant.name }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      
    };
  },
  props: {
    restaurant: Object,
  },
  methods: {},
  mounted() {
    console.log("RES COMO");
    console.log(this.restaurant);
  },
};
</script>

<style lang="scss" scoped>
.restaurant {
  &__container {
    display: flex;
    flex-direction: column;
    padding: 15px;
    background-color: white;
    color: black;
    border-radius: 5px;
  }

  &__link {
  }

  &__name {
  }
}
</style>