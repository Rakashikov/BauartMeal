<template>
  <div class="container">
    <div class="suborder_name">
      <details>
        <summary>{{ suborderdata.user }}</summary>
        <div class="detail_suborder">
          <div class="menu_positions">
            <div
              class="item_position"
              v-for="item in suborderdata.items"
              :key="item.name"
            >
              <div class="item_title">
                {{ item.name }}
              </div>
              <div class="item_count">{{ item.count }}</div>
              <div class="item_price">
                {{ item.price }} ₽
              </div>
            </div>
          </div>
          <div class="price">{{ suborderdata.price }} ₽</div>
        </div>
      </details>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  props: {
    suborderdata: Object,
  },
};
</script>

<style>

.detail_suborder {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}

.menu_positions {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.item_position {
  width: 90%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  
}

.item_title {
  width: 60%;
}

.suborder_name{
  background-color: #222327;
  border-bottom: 1px solid #151518;
  
}

summary {
  padding: 10px;
}

</style>