import { createApp } from "vue";

import Cart from "./Components/Cart.vue";
const app = createApp({
    data: () => ({
        products: [],
    }),
    computed:{
        totalAmount(){
            let result = this.products.reduce((total,{amount})=>total + amount, 0)
            if (result < 0) {
                result = 0;
            }
            return result;
        },
        totalPrice(){
            return this.products.reduce((total,{price,amount})=>total + (amount * price), 0 );
        },

    },
    methods: {
        removeProduct(index){
            this.products.splice(index,1);
        },
        removeAll(){
            this.products = [];
        },
        addMore(index){
            const product = this.products[index];
            this.products.splice(index,1 ,{...product,amount:product.amount+1})
        },
        removeOne(index){
            const product = this.products[index];
            if (product.amount > 1) {
                this.products.splice(index,1 ,{...product,amount:product.amount-1})
            }
        },
        async getData(url) {
            const response = await fetch(url);
            return await response.json();
        },
        checkoutOrder()
        {
            let arr = [];
            this.products.forEach((elem) => {
                for (let i = 0; i < elem.amount; i++) {
                    arr.push(elem.id);
                }
            })
            for (let i = 0; i < arr.length; i++) {
                const request = new XMLHttpRequest();
                const url = `/checkout-order`;
                const params = `id=${arr[i]}`;

                request.open("POST", url, true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(params);
            }
            setTimeout(() => {
                window.location.href = '/';
                this.removeAll();
            }, 5000);
        }

    },
});

app.component("cart", Cart);
app.mount("#app");