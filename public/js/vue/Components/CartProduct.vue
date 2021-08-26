<template>
  <li class="cart-item">
    <div>
      <div class="cart-item__image"><a :href="'/product/' + id"><img :src="'/public/products/' + image" :alt="title"></a></div>
      <div class="cart-item__name"><a href="#">{{title}}</a></div>
      <div class="cart-item__price"><a href="#">{{price * amount}} $</a></div>
      <div class="cart-item__amount">
        <button @click="removeOne" type="button" class="btn shadow-none"><i class="fa fa-minus"></i></button>
        <a href="#">{{amount}}</a>
        <button @click="addMore" type="button" class="btn shadow-none"><i class="fa fa-plus"></i></button>
      </div>
      <div class="cart-item__delete" @click="remove"><div><i class="fa fa-times" aria-hidden="true"></i></div></div>
    </div>
  </li>
</template>
<script>
export default {
  name: "CartProduct",

  props:{
    title:{
      type: String,
      isRequired: true,
    },
    category: String,
    price: Number,
    amount: Number,
    image: String,
    id: Number,
    index: Number
  },
  methods: {
    remove() {
      const request = new XMLHttpRequest();
      const url = `/delete-from-cart`;
      const params = `id=${this.id}`;

      request.open("POST", url, true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send(params);

      this.$root.removeProduct(this.index);
    },
    addMore() {
      this.$root.addMore(this.index);
    },
    removeOne() {
      this.$root.removeOne(this.index);
    }
  }
}
</script>
