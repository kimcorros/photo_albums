import { Model } from '@vuex-orm/core'
import Album from './Album'

export default class Photo extends Model {
  static entity = 'photos'

  static fields () {
    return {
      id: this.attr(null),
      album_id: this.attr(null),
      title: this.attr(''),
      url: this.attr(''),
      thumbnail_url: this.attr(false),
      album: this.belongsTo(Album, 'album_id')
    }
  }
}
