<template>
  <section class="cart">
    <div v-if="totalAmount > 0">
    <ul class="cart-list">
      <cart-product
          v-for="(product,index) in products"
          :index="index"
          :id="product.id"
          :title="product.title"
          :category="product.category"
          :price="product.price"
          :amount="product.amount"
          :image="product.image"
      />
    </ul>
    <div class="order">
      <div class="order-wrapper">
        <p>Total: </p><b>{{ totalPrice }} $</b>
      </div>
      <button class="btn btn-buy" @click="showModal = true">Proceed to checkout</button>
    </div>
    </div>
      <div class="oops-block" v-else>
      <h2>Cart is empty!</h2>
    </div>
    <modal v-if="showModal" @close="showModal = false"></modal>
  </section>
</template>


<script>
import CartProduct from "./CartProduct.vue";
import Modal from "./Modal.vue";
export default {
  name: "Cart",
  components: {CartProduct, Modal},
  data: () => ({
    showModal: false
  }),
  mounted() {
    this.getData(`api/cart`)
        .then((data) => {
          if (Object.keys(data).length !== 0) {
            let obj = this.countValues(data.items);
            for (const value in obj) {
              this.getData(`api/product/${value}`)
                  .then((data) => {
                    data.amount = obj[value];
                    this.$root.products.push(data);
                  })
                  .catch(err => console.log(`Error: ${err}`))
            }
          }
        })
        .catch(err => console.log(`Error: ${err}`))
  },
  methods: {
      async getData(url) {
        return await this.$root.getData(url);
      },
      countValues(arr) {
        if (typeof arr == 'object') {
          arr = Object.values(arr);
        }
        return JSON.parse(JSON.stringify(
            arr.reduce((acc, el) => {
              acc[el] = (acc[el] || 0) + 1;
              return acc;
            }, {}), null, 2))
      },
    },
    computed: {
      products() {
        return this.$root.products;
      },
      totalAmount() {
        return this.$root.totalAmount;
      },
      totalPrice() {
        return this.$root.totalPrice;
      }
    }
}
</script>
