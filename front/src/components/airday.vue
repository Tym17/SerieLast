<template>
  <div class="day">
    {{ day }}
    <div class="nextday">
        Wednesday
    </div>
  </div>
</template>

<script>
export default {
  props: ['day']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.day
{
    position: absolute;
    font-size: 20px;
    bottom: 1px;
    left: 5px;
    font-family: 'Roboto', sans-serif;
    color: #333;
}

.nextday
{
    position: absolute;
    bottom: 0px;
    left: -3px;
    background-color: #FFF;
    opacity: 0;
    padding-left: 3px;
    padding-right: 3px;
    transition-duration: 0.4s;
}

.nextday:hover
{
    opacity: 1;
}
</style>
