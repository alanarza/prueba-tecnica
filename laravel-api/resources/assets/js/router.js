import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	base: '/',
	routes: [
		{ path: '/', component: () => import('./views/index.vue') },
		{ path: '/create', component: () => import('./views/Create.vue') },
		{ path: '/search', name:'search', props: true, component: () => import('./views/Search.vue') },
	]
})

export default router