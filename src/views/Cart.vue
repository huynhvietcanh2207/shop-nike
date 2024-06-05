<template>
    <div class="cart">
        <HeaderView />

        <h1>Giỏ hàng của bạn</h1>

        <div v-if="cart.length === 0">
            <p>Giỏ hàng của bạn trống.</p>
        </div>

        <div v-else>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in cart" :key="item.id">
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }}</td>
                        <td>
                            <input type="number" v-model.number="item.quantity" @change="updateQuantity(item)"
                                min="1" />
                        </td>
                        <td>{{ item.price * item.quantity }}</td>
                        <td>
                            <button @click="removeFromCart(item)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2>Tổng cộng: {{ total }}</h2>
            <button @click="checkout">Thanh toán</button>
        </div>
        <div class="btn">
            <router-link to="/">
                <button class="btn btn-primary">
                    quay lại Home để mua
                </button></router-link>
        </div>
        <FooterView />
    </div>
</template>

<script>
    import axios from "axios";
    import HeaderView from "@/views/Header.vue";
    import FooterView from "@/views/Footer.vue";

    export default {
        name: "Cart",
        components: {
            HeaderView,
            FooterView,
        },
        data() {
            return {
                cart: [],
                userId: null, // Thêm userId vào data
            };
        },
        computed: {
            total() {
                return this.cart.reduce(
                    (sum, item) => sum + item.price * item.quantity,
                    0
                );
            },
        },
        methods: {
            updateQuantity(item) {
                if (item.quantity < 1) {
                    item.quantity = 1;
                }
                this.saveCart();
            },
            removeFromCart(item) {
                this.cart = this.cart.filter((cartItem) => cartItem.id !== item.id);
                this.saveCart();
            },
            saveCart() {                axios
                    .delete("http://localhost/shop-nike/src/app/api/api.php/cart/1" + this.userId)
                    .then(() => {
                        this.cart.forEach((item) => {
                            axios
                                .post("/api/cart", {
                                    user_id: this.userId,
                                    product_id: item.id,
                                    quantity: item.quantity,
                                })
                                .then(() => {
                                   
                                    this.fetchCart();
                                })
                                .catch((error) => {
                                    console.error("Error adding item to cart: ", error);
                                });
                        });
                    })
                    .catch((error) => {
                        console.error("Error clearing cart: ", error);
                    });
            },
            checkout() {
                axios
                    .delete("/api/cart/" + this.userId)
                    .then(() => {
                        console.log("Cart cleared successfully");
                        // Hiển thị thông báo thanh toán thành công
                        alert("Thanh toán thành công!");
                        // Xóa các mục trong giỏ hàng của client
                        this.cart = [];
                    })
                    .catch((error) => {
                        console.error("Error clearing cart: ", error);
                    });
            },
            fetchCart() {
                // Lấy giỏ hàng của người dùng từ cơ sở dữ liệu
                axios
                    .get("/api/cart/" + this.userId)
                    .then((response) => {
                        // Gán giỏ hàng lấy được vào biến cart
                        this.cart = response.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching cart: ", error);
                    });
            },
        },
        mounted() {
            // Lấy user_id từ session hoặc từ nơi khác phù hợp
            this.userId = 1; // Ví dụ user_id = 1

            // Lấy giỏ hàng của người dùng từ cơ sở dữ liệu
            this.fetchCart();
        },
    };
</script>


<style scoped>
    .cart {
        padding: 20px;
        margin: 200px 0;
        text-align: center;
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    h1,
    h2 {
        margin-bottom: 20px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: rgb(255, 255, 255);
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>