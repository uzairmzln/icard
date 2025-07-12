<script setup>
    import loginForm from '../element/loginForm.vue';
    import registerForm from '../element/registerForm.vue';
    import { useRoute } from 'vue-router';
    import { computed } from 'vue';

    const route = useRoute();
    
    // Determine which form to show based on current route
    const isRegisterPage = computed(() => route.path.includes('/register'));

</script>
<template>
    <div class="grid h-screen grid-cols-2">
        <div class="container">
            
        </div>
        <div class="flex items-center justify-center">
            <loginForm v-if="!isRegisterPage"></loginForm>
            <registerForm v-else></registerForm>
        </div>
    </div>
</template>
<style>
    .container {
        background-color: black;
    }
</style>