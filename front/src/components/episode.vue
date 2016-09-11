<template>
  <div class="main">
    <div class="s_season">S</div>
    <div class="season">
        {{ season }}
        <div class="picker">
            <div class="sp"><i class="fa fa-angle-left"></i></div>
            <div class="sp"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
    <div class="e_episode">E</div>
    <div class="episode">
        {{ episode }}
        <div class="picker">
            <div class="sp"><i class="fa fa-angle-left"></i></div>
            <div class="sp"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['season', 'episode']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.main
{
    position: absolute;
    bottom: 0px;
    right: 5px;
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    color: #333;
}

.episode
{
}

.e_episode
{
    position: absolute;
    bottom: 0px;
    right: 2.5ex;
    color: #777;
}

.season
{
    position: absolute;
    bottom: 0px;
    right: 4ex;
}

.s_season
{
    position: absolute;
    bottom: 0px;
    right: 6.5ex;
    color: #777;
}

.picker
{
    position: absolute;
    background: rgba(255, 255, 255, 1);;
    bottom: 0px;
    width: 2.3ex;
    left: -1px;
    height: 28px;
    cursor: pointer;
    opacity: 0;
    transition-duration: 0.3s;
}

.picker:hover
{
    opacity: 1;
}

.sp
{
    float: left;
    padding-left: 1px;
    padding-right: 3px;
    border-width: 1px;
    border-style: solid;
    color: #777;
    border-color: #FCFCFC;
    transition-duration: 0.5s;
}

.sp:hover
{
    color: #000;
}
</style>
