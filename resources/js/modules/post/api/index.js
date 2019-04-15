import axios from "axios";

export default {

  /**
   * Display a listing of the resource.
   *
   * @returns {AxiosPromise}
   */
  index () {
    return axios.get(route('api.posts.index'));
  },

}
