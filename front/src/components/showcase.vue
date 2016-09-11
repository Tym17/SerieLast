<template>
    <div class="showcase">
        <img :src="img"></img>
        <button class="delete">X</button>
        <div class="details">
            <airday :day="day" style="display: "></airday>
            <episode :season="season" :episode="episode"></episode>
        </div>
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
    position: relative;
    overflow: hidden;
    margin: 10px;
}

.showcase img
{
    width: 220px;
    height: 220px;
    opacity: 0.5;
    z-index: -1;
    cursor: pointer;
    transition-duration: 0.5s;
}

.showcase img:hover
{
    opacity: 1;
}

.details
{
    background: rgba(255, 255, 255, 0.5);
    position: absolute;
    bottom: 0px;
    width: 100%;
    box-shadow: 0px 0px 50px #333;
    height: 28px;
}

.delete
{
    position: absolute;
    top: 0px;
    right: 0px;
    border-radius: 2px;
    border: none;
    color: #777;
    background: rgba(255, 255, 255, 0.5);
    transition-duration: 0.2s;
    cursor: pointer;
}

.delete:hover
{
    color: #000;
    background: rgba(255, 255, 255, 0.75);
}


</style>
