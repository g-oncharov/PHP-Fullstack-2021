<template>
  <div class="modal">
  <div class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">

        <div class="modal-header">
          <h2>Confirm the order</h2>
        </div>

        <div class="modal-body">
          <p>{{ text }}</p>
        </div>
        <button class="modal-success-button btn btn-purple" :disabled="disabled" @click="checkoutOrder">Confirm</button>
        <button class="modal-close-button" @click="$emit('close')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data: () => ({
    text: 'In case of confirmation, our staff will contact you',
    disabled: false
  }),
  methods: {
    checkoutOrder()
    {
      if (!this.disabled) {
        this.text = 'Your order has been sent';
        this.$root.checkoutOrder();
      }
      this.disabled = true;
    }
  }
}
</script>

<style scoped>
.modal-mask {
  position: fixed;
  z-index: 999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.modal-wrapper {
  position: absolute;
  top: 30%;
  left: 0;
  right: 0;
  background-color: #fff;
  border-radius: 6px;
  width: 500px;
  padding: 30px;
  margin: 0 auto;
  margin-top: 40px;
  margin-bottom: 40px;

}
.modal h2 {
  font-size: 40px;
  color: #816eca;
  text-align: center;
}
.modal p {
  font-size: 20px;
}
.modal .modal-close-button {
  position: absolute;
  right: 10px;
  top: 10px;
  background-color: transparent;
  border: none;
  color: #ff0000;
  transition: color 0.4s;
  cursor: pointer;
}
.modal .modal-close-button:hover {
  color: #bf0000;
}
.modal .modal-success-button {
  margin-left: auto;
  display: block;
}

</style>