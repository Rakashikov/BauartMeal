<template>
  <div class="container">
    <!-- Левая честь -->
    <div class="check">
      <!-- Информация о ресторане и номере заказа -->
      <div class="order_info">
        <div class="order_title">
          <div class="restourant_name">
            {{ parsedata.name }}
          </div>
          <div class="order_id">Order #{{ order[0].id }}</div>
        </div>
        <!-- Лого ресторана -->
        <img :src="parsedata.logo" class="restourant_logo" />
      </div>

      <!-- Таблица с позициями -->
      <table class="positions_table">
        <!-- <tr class="columns_row"> -->
        <div class="columns_name">
          <td class="column_position">Позиция</td>
          <td class="column_count">кол-во</td>
        </div>
        <!-- </tr> -->
        <td class="positions">
          <ul class="list">
            <!-- Вызов компонентов с позициями -->
            <li v-for="item in cart" :key="item.product_name">
              <position-component :card="item"></position-component>
            </li>
          </ul>
        </td>
      </table>
      <hr />
      <!-- Информация о сумме заказа -->
      <div class="sum_info">
        <div class="sum_title">Сумма заказа</div>
        <div class="sum_total">{{ sum }} ₽</div>
      </div>
      <div class="buttons">
        <a class="button_cancel" href="/restaurants/index" type="submit"
          >Отмена</a
        >
        <a class="button_order" v-on:click="sendStore"
          >Заказать</a
        >
      </div>
    </div>
    <!-- Правая часть -->
    <div class="product_menu">
      <div class="overlay">
        <input
          type="text"
          placeholder="Search..."
          class="search"
          v-model="search"
        />
        <!-- <div class="cart_button"></div> -->
        <ul class="product_list">
          <!-- Вызов компонента с карточками -->
          <li
            class="product_card"
            v-for="item in searchCart"
            :key="item.product_id"
            v-on="cart"
          >
            <product-card-component :card="item"></product-card-component>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import PositionComponent from "./PositionComponent.vue";
import ProductCardComponent from "./ProductCardComponent.vue";
import { mapState, mapActions } from "vuex";
import axios from "axios";
export default {
  components: { ProductCardComponent, PositionComponent },
  props: {
    parsedata: Object,
    order: [Array,Object],
  },
  computed: {
    ...mapState("cart", {
      cart: (state) => state.cart,
    }),
    CartPos: {
      get() {
        return this.$store.state.cart.cart;
      },
    },
    token() {
      return $('meta[name="csrf-token"]').attr("content");
    },
    searchCart: function() {
      let items = this.parsedata.menu
      var res = [];
      if (this.search==''){
      return items;
      }
      items.forEach(item => {
        if(item.product_name.includes(this.search)){
          res.push(item)
        }
      });
      return res;
    },
    // cart() {
    //   return this.$store.getters.doneCart
    // }
  },
  watch: {
    CartPos: {
      // This will let Vue know to look inside the array
      deep: true,

      // We have to move our method to a handler field
      handler(newVal) {
        this.sum = Object.values(this.cart).reduce((result, item) => result + item.product_price * item.product_count,0);
      },
    },
  },
  data: function () {
    return {
      sum: 0,
      search: "",
    };
  },
  mounted() {
  },
  methods: {
    async sendStore() {
      await axios
        .post("/suborders/store", {
          _token: this.token,
          order_id: this.order[0].id,
          cost: this.sum,
          items: this.CartPos,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((e) => {
          console.log(e);
        });
      window.location.href = "/"
    },
    ...mapActions("cart", ["pushCartVariable"]),
  },
};
</script>

<style>
li {
  list-style-type: none;
}

.check {
  position: absolute;
  display: flex;
  left: 0%;
  right: 60%;
  top: 64px;
  bottom: 0%;
  flex-direction: column;
  flex-wrap: wrap;
  align-content: center;
  justify-content: space-around;
  align-items: stretch;

  background-color: #fff;
}

.order_info {
  position: relative;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: auto;
  height: auto;
  top: 5%;
}

.order_title {
  position: relative;
  width: auto;
  height: auto;
  display: block;
}

.restourant_name {
  font-family: Barlow;
  font-style: bold;
  font-weight: 600;
  font-size: 36px;
  line-height: 140%;
  /* or 39px */

  color: #111111;
}

.order_id {
  font-family: Barlow;
  font-style: normal;
  font-weight: 500;
  font-size: 24px;
  line-height: 140%;
  /* or 22px */

  color: #111111;
}

.restourant_logo {
  position: relative;
  width: 150px;
  height: auto;
  bottom: 20%;
}

.positions_table {
  position: relative;
  width: 70%;
  height: 50%;
  margin: 30px 0 0 0;
}

/* .columns_row {
  height: 50px;
} */

.columns_name {
  height: 50px;
  display: flex;
  justify-content: space-around;
}

.column_position {
  position: relative;
  width: 70%;
  font-family: Barlow;
  font-style: normal;
  font-weight: 300;
  font-size: 24px;
  /* or 22px */
  display: inline;

  color: #aeaeae;
}

.column_count {
  position: relative;
  width: 25%;
  font-family: Barlow;
  font-style: normal;
  font-weight: 300;
  font-size: 24px;
  /* or 22px */
  /* text-align: center; */
  display: inline;

  color: #aeaeae;
}

.positions {
  width: 100%;
  height: 90%;
  bottom: 10%;
  border-spacing: 10px;
  border-collapse: separate;
  display: block;
  overflow-y: scroll;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.positions::-webkit-scrollbar {
  display: none;
}

.list {
  height: 100%;
  margin: 0;
  padding: 0;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.list::-webkit-scrollbar {
  display: none;
}

hr {
  margin: 10px 0 10px 0;
  opacity: 0.23;
  border: 1px solid #000000;
  background-color: #000000;
}

.sum_info {
  position: relative;
  width: auto;
  /* margin: 40px 20px 0 20px; */
  display: flex;
  justify-content: space-between;
}

.sum_title {
  font-family: Barlow;
  font-style: normal;
  font-weight: normal;
  font-size: 24px;
  line-height: 140%;
  /* or 22px */

  color: #111111;
}

.sum_total {
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: 600;
  font-size: 24px;
  line-height: 28px;
  display: flex;
  align-items: center;
  text-align: right;

  color: #000000;
}

.buttons {
  position: relative;
  width: auto;
  height: 120px;
  margin: 0 20px 0 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.button_cancel {
  width: 45%;
  height: 50%;
  display: flex;
  border: 1px solid #9a0000;
  box-sizing: border-box;
  border-radius: 10px;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 140%;
  /* identical to box height, or 20px */
  align-content: center;
  align-items: center;

  justify-content: center;

  color: #9a0000;
}

.button_cancel:hover {
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 140%;
  /* identical to box height, or 20px */
  align-content: center;
  align-items: center;
  color: #9a0000;
  text-decoration: none;
}

.button_order {
  width: 45%;
  height: 50%;
  display: flex;
  background: #00a124;
  border-radius: 10px;

  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 140%;
  /* identical to box height, or 20px */

  align-content: center;
  align-items: center;
  justify-content: center;

  text-align: center;

  cursor: pointer;

  color: #ffffff;
}

.button_order:hover {
  font-family: Chronica Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 140%;
  /* identical to box height, or 20px */
  align-content: center;
  align-items: center;
  color: #ffffff;
  text-decoration: none;
}

.search {
  position: relative;
  width: 70%;
  height: 60px;
  top: 0;
  background: transparent;
  border: 0px;
  border-bottom: 2px solid #ffffff;
  outline: 0px;

  background-image: url("/assets/img/Search_icon.svg");
  background-repeat: no-repeat;
  background-size: 32px 32px;
  background-position: 100% center;

  font-family: Chronica Pro;
  font-style: italic;
  font-weight: normal;
  font-size: 32px;
  line-height: 35px;

  color: #ffffff;
}

/* .cart_button {
  position: relative;
  width: 60px;
  height: 60px;
  left: 88%;
  top: 5%;
  outline: transparent;
  background: transparent;
  background-image: url("/assets/img/Cart_icon.svg");
  background-repeat: no-repeat;
  background-size: 60px 60px;
  background-position: center;
  cursor: pointer;
  float: left;
} */

.product_list {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  top: 5%;
  bottom: 0%;
  width: 97%;
  height: 80%;
  justify-content: space-evenly;
  overflow-y: auto;
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.product_list::-webkit-scrollbar {
  display: none;
}

.product_card {
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  position: relative;
  width: 500px;
  min-width: 500px;
  height: 210px;
}

.product_menu {
  position: absolute;
  left: 40%;
  right: 0%;
  top: 64px;
  bottom: 0%;
  background-image: url("/assets/img/Product_background.png");
  background-size: cover;
}

.overlay {
  position: absolute;
  display: flex;
  align-items: flex-start;
  flex-direction: column;
  justify-content: flex-start;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
  background: rgba(24, 24, 24, 0.8);
}
</style>
