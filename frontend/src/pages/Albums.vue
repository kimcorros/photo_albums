<template>
  <q-page>
    <div class="q-px-md">
      <div class="q-col-gutter-sm row items-start">
        <div class="col-12">
          <h5>Albums</h5>
        </div>
      </div>
    </div>
    <div class="q-pa-md">
      <div class="q-col-gutter-md row items-start">
        <div class="col-3" v-for="album in albums" :key="album.id">
          <router-link :to="`/albums/${album.id}/photos`">
            <q-img
              :src="getThumbnailUrl(album)"
              style="width: 100%"
              native-context-menu
              class="cursor-pointer"
            >
              <div class="absolute-bottom text-subtitle1 text-center">
                <q-icon name="collections" class="q-mr-sm"/> <strong>Album Title:</strong> {{ album.title }}
              </div>
            </q-img>
          </router-link>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import Album from 'models/Album'
import Photo from 'models/Photo'

export default {
  name: 'Albums',
  async mounted () {
    await this.$axios.get('/albums')
      .then((response) => {
        Album.insertOrUpdate({ data: response.data })
      })

    await this.$axios.get('/photos')
      .then((response) => {
        Photo.insertOrUpdate({ data: response.data })
      })
  },
  computed: {
    albums() {
      return Album.all()
    }
  },
  methods: {
    getThumbnailUrl(album) {
      const photo = Photo.query().where('album_id', album.id).first()
      return photo ? photo.thumbnail_url : null
    }
  },
}
</script>
