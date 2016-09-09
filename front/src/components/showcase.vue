<template>
  <div>
    <img v-bind:src="img_source"></img>
    <airday></airday>
    <episode></episode>
  </div>
</template>

<script>
import airday from './airday'
import episode from './episode'

export default {
  components: {
    airday, episode
  },
  data () {
    return {
      // note: changing this line won't causes changes
      // with hot-reload because the reloaded component
      // preserves its current state and we are modifying
      // its initial state.
      img_source: 'http://vuejs.org/images/logo.png'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  color: #42b983;
}
</style>
