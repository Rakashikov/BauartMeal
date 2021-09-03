<template>
  <div class="container">
    <div class="restaurants_title">Restaurants</div>
    <div class="tickets">
      <div class="overlay">
        <div class="input_block">
          <input
            type="text"
            v-model="link"
            class="inp-rest"
            placeholder="Link..."
          />
          <button type="submit" v-on:click="add_click" class="button-add-rest">
            Add
          </button>
        </div>
        <div class="restaurant_list">
          <div
            class="restaurant_card"
            v-for="rest in restaurants"
            :key="rest.id"
          >
            <restaurant-card-component
              :restaurant="rest"
              :isauth="isauth"
            ></restaurant-card-component>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import RestaurantCardComponent from "./RestaurantCardComponent.vue";
import axios from "axios";
export default {
  components: { RestaurantCardComponent },
  mounted() {
  },
  props: {
    restaurants: Array,
    isauth: Number,
  },
  data() {
    return {
      link: "",
    };
  },
  computed:{
    token() {
      return $('meta[name="csrf-token"]').attr("content");
    },
  },
  mounted(){
  },
  methods: {
    add_click: async function () {
      if(Boolean(this.isauth)){
      await axios
        .post("/restaurants/store", {
          _token: this.token,
          link: this.link,
        })
        .then((response) => {})
        .catch((e) => {
          console.log(e);
        });
        window.location.reload();
      }else{
        alert("Need log in!")
      }
    },
  },
};
</script>

<style>
.restaurants_title {
  position: absolute;
  display: flex;
  top: 64px;
  width: 40%;
  height: calc(100% - 64px);
  left: 0;
  align-content: center;
  justify-content: center;
  align-items: center;

  background-color: #fff;
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: 300;
  font-size: 600%;
  line-height: 140%;
  text-align: right;

  color: #111111;
}

.input_block {
  position: relative;
    display: flex;
    width: 90%;
    height: 10%;
    top: 0%;
    background: transparent;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
    justify-content: space-around;
}

.tickets {
  position: absolute;
  left: 40%;
  right: 0%;
  top: 64px;
  bottom: 0%;
  background-image: url("/assets/img/Restaurants_background.png");
  background-size: cover;
}

.inp-rest {
  
  position: relative;
    width: 80%;
    height: 60px;
    bottom: 10%;
    background: transparent;
    border: 0px;
    border-bottom: 2px solid #ffffff;
    outline: 0px;
    
    background-size: 32px 32px;
    background-position: 100% center;
    font-family: Chronica Pro;
    font-style: italic;
    font-weight: normal;
    font-size: 25px;
    line-height: 35px;
    color: #ffffff
}

.button-add-rest {
  position: relative;
   width: 200px;
  height: 40px;
  background: #00a124;
  border-radius: 10px;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 24px;
  line-height: 140%;
  /* identical to box height, or 20px */

  text-align: center;

  color: #ffffff;
}

.restaurant_list {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  top: 0%;
  bottom: 0%;
  width: 100%;
  height: 90%;
  overflow-y: scroll;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.restaurant_list::-webkit-scrollbar {
  display: none;
}

.restaurant_card {
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
  width: 300px;
  min-width: 300px;
  height: 300px;
  min-height: 300px;
}

.overlay {
  position: absolute;
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  align-content: flex-start;
  align-items: center;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
  background: rgba(24, 24, 24, 0.8);
  justify-content: space-evenly;
  overflow-y: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
  padding: 60px;
}

.overlay::-webkit-scrollbar {
  display: none;
}
</style>