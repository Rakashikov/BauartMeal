<template>
  <div class="modal-wrapper" v-show="show">
    <div class="modal-shadow" />
    <div class="modal-content">
      <form action="/restaurants/store" method="POST">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Name:</strong>
              <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Name"
              />
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Link:</strong>
              <textarea
                class="form-control"
                style="height: 150px"
                name="link"
                placeholder="Link"
              ></textarea>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      orders: {
        order: [
          {
            id: "0111",
            user: "Настя",
            sum: "12432",
            created_at: "12.03.2000",
            suborders: [
              {
                user: "Настя",
                price: "2423",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
              {
                user: "Яна",
                price: "324",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
              {
                user: "Женя",
                price: "324",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
            ],
          },
          {
            id: "0111",
            user: "Настя",
            sum: "12432",
            created_at: "12.03.2000",
            suborders: [
              {
                user: "Настя",
                price: "2423",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
              {
                user: "Яна",
                price: "324",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
              {
                user: "Женя",
                price: "324",
                items: [
                  { name: "Шефбургер", price: "149₽", count: "14" },
                  { name: "Твистер", price: "233₽", count: "4" },
                  { name: "Картофель", price: "100₽", count: "3" },
                ],
              },
            ],
          },
        ],
      },
    };
  },

  methods: {
    click() {
      this.show = !this.show;
    },
  },
};
</script>

<style>
.modal-wrapper {
  position: fixed;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.modal-shadow {
  height: 100%;
  width: 100%;
  position: absolute;
  background-color: rgba(255, 255, 255, 0.3);
  z-index: -1;
}
.modal-content {
  height: 400px;
  width: 700px;
  background-color: white;
}
</style>