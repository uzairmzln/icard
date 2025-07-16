<script setup>
        
</script>
<template>
    <Card class="p-5 h-100 bg-gradient-to-r from-indigo-900 via-purple-800 to-indigo-900 text-white rounded-xl shadow-lg" unstyled>
        <template #title>
            <div class="text-4xl font-bold mb-2">Hello! UserName</div>
            <div class="text-2xl font-bold mb-2">Welcome to iCard</div>
        </template>

        <template #content>
            <p class="text-sm mb-4">
                Start creating, managing, and showcasing your digital cards with ease. Your smart portfolio identity begins here.
            </p>

            <div class="flex gap-3">
                <Button label="Explore Features" class="bg-yellow-500 text-black font-bold px-4 py-2 rounded-full cursor-pointer hover:bg-yellow-700" unstyled />
                <router-link to="/dashboard/create-card">
                    <Button label="Create Your First Card" class="bg-transparent border border-white px-4 py-2 rounded-full text-white cursor-pointer hover:bg-yellow-700" unstyled />
                </router-link>
            </div>
        </template>
    </Card>
</template>