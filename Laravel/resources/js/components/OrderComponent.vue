<template>
  <div class="container">
    <div class="order_frame" :class="statusColor">
      <div class="order_container">
        <div
          class="order_column"
          style="word-break: keep-all; text-align: left"
        >
          {{ orderdata.rest }}
        </div>
        <div class="order_column">{{ orderdata.created_at }}</div>
        <div
          class="order_column"
          style="word-break: keep-all; text-align: right"
        >
          Order №{{ orderdata.id }}
        </div>
      </div>

      <div
        class="suborder_style"
        v-for="suborder in orderdata.suborders"
        :key="suborder.user"
      >
        <suborder-component :suborderdata="suborder"></suborder-component>
      </div>
      <div class="footer_order">
        <button class="button_order" v-if="orderdata.is_waiting" v-on:click="changeStatus" >Подтвердить</button>

        <div class="price_order">Общая сумма: {{ orderdata.sum }} ₽</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
  },
  props: {
    orderdata: Object,
  },
  computed: {
    statusColor: function () {
      console.log(this.orderdata);
      return this.orderdata.is_waiting ? "yellow" : "green";
    },
    statusButton: function () {
      console.log(this.orderdata);
      return this.orderdata.is_waiting ? "button_order" : "falseButton";
    },
    token() {
      return $('meta[name="csrf-token"]').attr("content");
    }
  },
  methods:{
    changeStatus: async function(){
      await axios.post("/orders/update", {
          _token: this.token,
          is_waiting: 0,
          order_id: this.orderdata.id
        })
        .then((response) => {
          console.log(response);
        })
        .catch((e) => {
          console.log(e);
        });
      window.location.reload();
    }
  }
};
</script>

<style scoped>
.order_column {
  width: 100%;
  text-align: center;
}
.green {
  border: 2px solid green;
}

.yellow {
  border: 2px solid yellow;
}

.falseButton{
  
}

.order_frame {
  background-color: #2c2e33;
  border-radius: 10px;
}

.order_container {
  display: flex;
  justify-content: space-between;
  padding: 10px;
}

.order_id {
  color: white;
}

.price_order {
  text-align: right;
  margin-top: 7px;
  padding: 10px;
}
.suborder_style {
  margin-bottom: 10px;
}
.price {
  width: 100%;
  text-align: right;
  font-size: 22px;
}

.user_name {
  width: 50%;
}

.order_date {
  width: 25%;
}

.order_id {
  width: 25%;
  text-align: right;
}

summary {
  padding: 10px 0px 10px 0px;
}

.footer_order {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  flex-wrap: nowrap;
  align-content: center;
  align-items: center;
  padding: 0 15px 10px 15px;
}

.button_order {
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
</style>