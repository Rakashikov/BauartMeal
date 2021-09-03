<template>
  <div class="container">
    <div class="history_title">History</div>
    <div class="history_tickets">
      <div class="overlay">
       

        <div class="history_list" style="color: white">
          <div class="order_style" v-for="order in orders" :key="order.id">
            
              <order-component :orderdata="order"></order-component>
        
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import OrderComponent from "./OrderComponent.vue";
import axios from "axios";
export default {
  components: { OrderComponent },
  props:{
    orders:Array,
  },
  data: () => {
    return {
    };
  },

  mounted() {
  },
  created() {},
};
</script>
<style>
/*  */

/* est */
.history_title {
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

/* est */
.history_tickets {
  position: absolute;
  left: 40%;
  right: 0%;
  top: 64px;
  bottom: 0%;
  background-image: url("/assets/img/Restaurants_background.png");
  background-size: cover;
}

/* est */
.history_list {
  position: relative;
  display: block;
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

/* est */
.history_list::-webkit-scrollbar {
  display: none;
}

/* est */
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

/* est */
.overlay::-webkit-scrollbar {
  display: none;
}

li {
  list-style-type: none;
}

/* est */
.history_name {
  font-family: Barlow;
  font-style: bold;
  font-weight: 600;
  font-size: 36px;
  line-height: 140%;
  /* or 39px */

  color: #111111;
}

/* est */
.history_logo {
  position: relative;
  width: 150px;
  height: auto;
  bottom: 20%;
}

/* est */
.overlay {
  position: absolute;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
  background: rgba(24, 24, 24, 0.8);
}

.order_style {
  font-size: 20px;
  display: flex;
  height: auto;
  margin-bottom: 20px;
 
}
</style>