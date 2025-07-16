<script setup>
import MainMenu from '../element/mainMenu.vue';
</script>
<template>
  <MainMenu></MainMenu>
  <div class="p-5">
    <router-view /> <!-- this will load Dashboard or CreateCardForm etc -->
  </div>
</template>
