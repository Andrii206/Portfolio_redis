<template>

        <h1 class="text-lg mb-8">Post</h1>
        <div class="mb-8">
            <Link :href="route('post.index')" class="text-sky-500 text-sm">Back</Link>
        </div>
        <div v-if="post">
            <div class="mt-4 pt-4 border-t border-gray-400">
                <div>Id: {{ post.id }}</div>
                <div>Title: {{ post.title }}</div>
                <div>Content: {{ post.content }}</div>
                <div class="text-sm text-right">{{ post.date }}</div>
            </div>
        </div>

</template>
<script>
import {Link} from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
export default {
    name: "Index",
    layout: MainLayout,
    props: [
        'post',
    ],

    components :{
        Link
    }
}
</script>
<style scoped>
</style>