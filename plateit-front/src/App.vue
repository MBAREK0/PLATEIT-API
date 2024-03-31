<template >
  <!-- <nav  class="dark:bg-gray-500 dark:text-white ">
    <router-link to="/" class="dark:text-white">Home</router-link> |
    <router-link to="/about" class="dark:text-white">About</router-link>
  </nav> -->
  <button @click="toggleDark()" class=" bg-slate-500 text-center text-cyan-300 p-3 m-3 " >darkmode</button>

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

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

/* my classes  */
.align-self-start{
align-self: flex-start;
}
</style>
