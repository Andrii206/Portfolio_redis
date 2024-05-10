<template>
    <div class="mx-auto w-1/2">
        <div class="mb-4">
            <h3 class="text-xl">Додати пост</h3>
        </div>
        <div class="mb-8">
            <Link :href="route('post.index')" class="text-sky-500 text-sm">Back</Link>
        </div>
        <div>
            <div>
                <div class="mb-4">
                    <input type="text" class="border border-gray-300 borde" v-model="title">
                </div>
                <div class="mb-4">
                    <input type="text" class="border border-gray-300 borde" v-model="content">
                </div>
                <div class="mb-4">
                    <input type="text" class="border border-gray-300 borde" v-model="likes">
                </div>
                <div class="mb-4">
                    <a @click.prevent="store" class="inline-block px-4 py-2 text-white bg-sky-700">Додати</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import axios from "axios";
import {Link} from '@inertiajs/vue3'

export default {
    name:"Create",
    layout: MainLayout,

    data() {
        return{
            'title' : '',
            'content' : '',
            'likes' : 0,

        }
    },

    components :{
        Link
    },

    methods: {
        store() {
            axios.post('/posts', {
                title : this.title,
                content : this.content,
                likes : this.likes
            }).then(response => {
            this.$router.push({ name: 'post.index' });
        })
        },
    },
}
</script>
<style scoped>
</style>