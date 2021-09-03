<template>
  <div class="rest_card">
    <a class="rest_frame" v-on:click="checkAuth">
    <!-- <a class="rest_frame" :href="`/restaurants/show/` + restaurant.id" v-on:click=""> -->
      <!-- <div class="restaurant_name">{{ restaurant.name }}</div> -->
      <img :src="restaurant.image" class="rest_img">
    </a>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  props: {
    restaurant: Object,
    isauth: Number,
  },
  methods: {
    checkAuth() {
      if (Boolean(this.isauth)) {
        window.location.href="/restaurants/show/" + this.restaurant.id;
      } else {
        alert("Need log in!")
      }
    }
  }
};
</script>

<style>
.rest_card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex-wrap: nowrap;
  height: 60%;
  width: 60%;
  left: 20%;
  right: 20%;
  top: 20%;
  bottom: 20%;
  background: transparent;
  border: transparent;
}

.rest_frame {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: row;
  align-content: center;
  flex-wrap: wrap;
  justify-content: center;
  background: #fff;
  cursor: pointer;

  border: 3px solid #ffffff;
  box-sizing: border-box;
  border-radius: 6px;
}

.rest_img{
    position: relative;
    width: 70%;
    height: auto;
    object-fit: cover;
}

.restaurant_name {
  position: relative;
  font-family: Barlow;
  font-style: normal;
  font-weight: 500;
  font-size: 50px;
  line-height: 140%;
}
</style>
