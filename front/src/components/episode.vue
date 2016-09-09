<template>
  <div>
    S{{ season }}E{{ episode }}
  </div>
</template>

<script>
export default {
  props: ['season', 'episode']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  color: #42b983;
}
</style>
