<template >

  <router-view/>

</template>

<script setup>
// setup the dark mode with vueuse
import  { useDark , useToggle } from "@vueuse/core"
const isDark = useDark();
const toggleDark = useToggle(isDark)
// --------------------- end the config of dark mode 
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

</style>
