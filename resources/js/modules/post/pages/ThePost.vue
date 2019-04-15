<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <post v-for="post in posts" :key="post.id" :post = "post"></post>
        </div>
    </div>
</template>

<script>
import postApi from '../api/index';
import Post from '../components/Post';

  export default {
    /**
     * Name of the component.
     */
    name: "ThePost",

    /**
     * Child components.
     */
    components: {
        Post
    },

    /**
     * Component data.
     */
    data() {
        return {
          posts: null
        }
    },

    /**
     * Async Mounted.
     *
     * @returns {Promise<void>}
     */
    async mounted() {
      const loader = this.$loading.show();
      const response = await postApi.index();
      this.posts = response.data.data;
      loader.hide();
    }
  };
</script>
