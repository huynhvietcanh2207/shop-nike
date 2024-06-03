import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import Login from '../views/Login.vue';
import CategoryProduct from '../views/CategoryProduct.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
  },
  {
    path: '/footer',
    name: 'footer',
    component: () => import(/* webpackChunkName: "footer" */ '../views/Footer.vue')
  },
  {
    path: '/header',
    name: 'header',
    component: () => import(/* webpackChunkName: "header" */ '../views/Header.vue')
  },
  {
    path: '/category/:categoryName', // Thay đổi từ categories_id thành categoryName
    name: 'categoryproduct',
    component: () => import(/* webpackChunkName: "categoryproduct" */ '../views/CategoryProduct.vue'),
    props: true
  },
  {
    path: '/cart', // Thay đổi từ categories_id thành categoryName
    name: 'cart',
    component: () => import(/* webpackChunkName: "categoryproduct" */ '../views/Cart.vue'),
    props: true
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
