import './bootstrap';
import Vue from 'vue';
import PostPage from './modules/post/pages/ThePost'

(new Vue({
  /**
   * DOM Element selector.
   */
  el: '.vue-app',

  /**
   * Child components.
   */
  components: {
    PostPage,
  },

}));

