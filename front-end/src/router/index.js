import LoginView from '../pages/Login/index.vue';
import HomeView from '../pages/Home/index.vue';
import criarUsuarioView from '../pages/Usuario/criarUsuario.vue';

import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  { path: '/', component: HomeView },
  { path: '/login', component: LoginView },
  { path: '/usuario', component: criarUsuarioView },
]

const router = createRouter({
  history: createWebHistory(),
  routes, 
})

export default router;
