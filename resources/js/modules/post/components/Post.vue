<template>
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ post.title }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">{{ post.body }}</p>
            <a :href="route('posts.show', { post: post.slug })" class="btn-sm btn-primary">Read More</a>
        </div>
        <div class="card-footer text-muted">
            {{ created_at }} by {{ post.user.name }}
        </div>
    </div>
</template>

<script>
  import moment from 'moment';

  export default {
    /**
     * Name of the component.
     */
    name: "Post",

    /**
     * Properties.
     */
    props: {

      /**
       * Post Object.
       * @type Object
       */
      post: {
        type: Object,
        default: '',
      },
    },

    /**
     * Component data
     * @returns {{}}
     */
    data() {
      return {
      }
    },

    /**
     * Computed properties.
     */
    computed: {
      created_at() {
        return moment(this.post.created_at).fromNow();
      }
    }
  }
</script>
