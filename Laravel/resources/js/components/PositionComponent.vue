<template>
  <div class="position">
    <td class="position_img_column">
      <img :src="card.product_image" class="position_img" />
    </td>
    <td class="position_info_column">
      <div class="position_name">{{ card.product_name }}</div>
      <div class="position_price">{{ card.product_price }} ₽</div>
    </td>
    <td class="position_count_column">
      <input
        class="count"
        type="number"
        v-model.number="cart[card.product_name].product_count"
      />
    </td>
    <td class="position_delete_column">
      <a v-on:click="deleteCartVariable(card.product_name)" class="delete_button">
        <img src="/assets/img/Delete_icon.svg">
      </a>
    </td>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  props: ["card"],
  computed: {
    ...mapState("cart", {
      cart: (state) => state.cart,
    }),
  },

  
  methods: {
    ...mapActions("cart", ["pushCartVariable", "deleteCartVariable"]),
  },
  mounted() {
    console.log("Test Component mounted.");
  },
};
</script>

<style>
.position {
  width: 100%;
  display: flex;
  align-items: center;
}

.position_img {
  width: 60px;
  height: 60px;
  object-fit: cover;
}
.position_info_column {
  width: 65%;
  vertical-align: middle;
}

.position_name {
  position: relative;
  display: block;
  width: 100%;
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: 400;
  font-size: 24px;
  line-height: 25px;

  color: #000000;
}

.position_price {
  position: relative;
  vertical-align: bottom;
  width: 100%;
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 23px;
  color: #000000;
}

.count {
  position: relative;
  width: 60px;
  height: 50px;
  border: 1px solid #00000030;
  box-sizing: border-box;
  vertical-align: middle;
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 140%;
  /* identical to box height, or 22px */
  color: #111111;
  text-align: center;
}
.position_delete_column {
  width: 10%;
  min-width: 20px;
}

.delete_button{
  cursor: pointer;
}

.position_img_column {
  width: 15%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.position_count_column {
  width: 20%;
  text-align: center;
}
</style>
