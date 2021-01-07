import { Model } from '@vuex-orm/core'
import Photo from './Photo'

export default class Album extends Model {
  static entity = 'albums'

  static fields () {
    return {
      id: this.attr(null),
      title: this.attr(''),
      photos: this.hasMany(Photo, 'album_id')
    }
  }
}
