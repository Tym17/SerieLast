<template>
  <div class="showcase">
    <img v-bind:src="img"></img>
    <airday :day="day" style="display: "></airday>
    <episode :season="season" :episode="episode"></episode>
  </div>
</template>

<script>
import airday from './airday'
import episode from './episode'

export default {
  components: {
    airday, episode
  },
  props: ['img', 'day', 'season', 'episode']

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.showcase
{
  border: 1px solid #EEE;
  box-shadow: 0px 0px 10px #777;
  height: 220px;
  width: 220px;
}

.showcase img
{
  width: 220px;
  height: 220px;
}

</style>
