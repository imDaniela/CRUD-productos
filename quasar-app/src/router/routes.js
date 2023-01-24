
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/List.vue') }
    ]
  },
  {
    path: '/add_producto',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {path: '', component: () => import('pages/AddProduct.vue')}
    ]
  },
  {
    path: '/variaciones',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {path: '', component: () => import('pages/ListProductVariants.vue')}
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
