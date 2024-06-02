<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
// import axios from "axios";

// export default {
//   name: "App",
//   data() {
//     return {
//       products: [], // Khai báo mảng products trong data
//     };
//   },
//   methods: {
//     showImage(event) {
//       const small = event.target;
//       const full = document.getElementById("imagebox");
//       if (full) {
//         full.src = small.src;
//       }
//     },
//   },
//   mounted() {
//     axios
//       .get("http://localhost/shop-nike/src/app/api/api.php/products")
//       .then((response) => {
//         this.products = response.data;
//       })
//       .catch((error) => {
//         console.error("There was an error!", error);
//       });
//   },
// };
</script>

<style scoped>
/* CSS cho App.vue */
</style>
