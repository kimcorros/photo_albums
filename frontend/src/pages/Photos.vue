<template>
  <q-page>
    <div class="q-px-md">
      <div class="q-col-gutter-sm row items-start">
        <div class="col-12 flex flex-start">
          <h5><router-link to="/albums">Albums</router-link> <q-icon name="chevron_right" /> {{ album.title }}</h5>
        </div>
      </div>
    </div>
    <div class="q-pa-md">
      <div class="q-col-gutter-md row items-start" v-if="photos.length > 0" >
        <div class="col-2" v-for="photo in photos" :key="photo.id">
          <a :href="photo.url">
            <q-img
              :src="photo.thumbnail_url"
              style="width: 100%"
              native-context-menu
              class="cursor-pointer"
              :href="photo.url"
            >
              <div class="absolute-bottom text-subtitle1 text-center">
                {{ photo.title }}
              </div>
            </q-img>
          </a>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import Album from 'models/Album'
import Photo from 'models/Photo'

export default {
  name: 'Photos',
  async mounted () {
    await this.$axios.get(`/albums/${this.$route.params.id}`)
      .then((response) => {
        Album.insertOrUpdate({ data: response.data })
      })

    await this.$axios.get(`/albums/${this.$route.params.id}/photos`)
      .then((response) => {
        Photo.insertOrUpdate({ data: response.data })
      })
  },
  computed: {
    album() {
      return Album.find(parseInt(this.$route.params.id)) || {}
    },
    photos() {
      return Photo.query().where('album_id', parseInt(this.$route.params.id)).get()
    }
  },
}
</script>
