<script setup>
import MainMenu from '../element/menu/sideMenu.vue';
</script>
<template>
  <MainMenu></MainMenu>
  <div class="p-5">
    <router-view />
  </div>
</template>
