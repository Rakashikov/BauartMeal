<template>
  <div class="card">
    <div class="frame">
      <div class="product_name">{{ card.product_name }}</div>
      <div class="product_discription">{{ card.product_disc }}</div>
      <div class="product_image_background">
        <div class="product_image_content">
          <img :src="card.product_image" class="product_img" />
        </div>
      </div>
      <div class="product_price">{{ card.product_price }} ₽</div>
      <button class="add_button" v-on:click="pushCartVariable(card)">Добавить</button>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  mounted() {
  },
  props: {
    card: Object
  },
  computed: {
    ...mapState('cart', {
        cart: state => state.cart
      }),
  },
  methods: {
    ...mapActions("cart", ["pushCartVariable"])
  }
};
</script>

<style>
.card {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  position: absolute;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
  background: transparent;
  border: transparent;
}
.frame {
  position: absolute;
  left: 5%;
  right: 5%;
  top: 5%;
  bottom: 5%;
  background: rgba(0, 0, 0, 0.527);

  border: 3px solid #ffffff;
  box-sizing: border-box;
  border-radius: 6px;
}
.product_name {
  position: relative;
  width: 48%;
  left: 45%;
  right: 5%;
  top: 10%;
  bottom: 70%;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 150%;
  line-height: 100%;

  color: #ffffff;
}
.product_discription {
  position: relative;
  width: 48%;
  left: 45%;
  right: 10%;
  top: 15%;
  bottom: 25%;
  float: inline-start;
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 100%;
  line-height: 100%;

  color: #aaaaaa;
}

.product_image_background {
  position: absolute;
  height: 100%;
  width: 183px;
  left: 0%;
  top: 0%;
  bottom: 0%;
  background-color: white;
  border-radius: 3px 0px 0px 3px;
}

.product_image_content {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.product_img {
  position: relative;
  max-width: 180px;
  height: 100%;
  object-fit: cover;
}

.product_price {
  position: absolute;
  left: 45%;
  right: 22%;
  top: 80%;
  bottom: 15%;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 24px;
  line-height: 21px;
  /* identical to box height */

  display: flex;
  align-items: center;
  text-align: right;

  color: #ffffff;
}

.add_button {
  position: absolute;
  left: 75%;
  right: 10%;
  top: 75%;
  bottom: 10%;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 17px;
  line-height: 15px;
  display: flex;
  align-items: center;
  text-align: center;

  background-color: #1eff00;
  border-radius: 3px;

  color: #ffffff;
}
</style>
