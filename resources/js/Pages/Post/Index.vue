<template>
    <div class="w-1/2 mx-auto">
        <h1 class="text-lg mb-8">Index</h1>
        <div class="mb-6">
            <Link :href="route('post.create')" class="hover:text-cyan-500 hover:bg-white border border-cyan-500 block p-2 w-32 bg-cyan-500 rounded-full text-center text-white">Add post</Link>
        </div>
        <div v-if="posts">
            <div v-for="post in posts" :key="post.id" class="mt-4 pt-4 border-t border-gray-400">
                <div>Id: {{ post.id }}</div>
                <div>Title: {{ post.title }}</div>
                <div>Content: {{ post.content }}</div>
                <div class="text-sm text-right">{{ post.likes }}</div>
                <div class="text-sm text-right mt-3">
                    <Link :href="route('post.show', post.id)" class="text-sky-500 border border-sky-500  rounded-full p-2 mt-3 ml-3 w-20 text-center">Show</Link>
                    <Link @click="deletePost(post.id)"  class="text-red-500 border border-red-500  rounded-full p-2 mt-3 ml-3 w-20 text-center cursor-pointer">Delete</Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
    name: 'Index',
    layout: MainLayout,

    props: {
        posts: Array,
    },

    components: {
        Link,
        MainLayout,
    },
    
    methods: {
        deletePost(id) {
            this.$inertia.delete(`/posts/${id}`);
        },
    },
};
</script>
