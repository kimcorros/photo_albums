
import Albums from 'pages/Albums'

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {
        path: '',
        component: () => import('pages/Index.vue')
      },
      {
        path: '/albums',
        name: 'albums',
        component: Albums
      },
      {
        path: '/albums/:id/photos',
        name: 'album.photos',
        component: () => import('pages/Photos')
      },
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
