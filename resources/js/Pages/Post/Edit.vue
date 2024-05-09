<template>

        <h1 class="text-lg mb-4">Edit</h1>
        <div class="mb-8">
            <Link :href="route('post.index')" class="text-sky-500 text-sm">Back</Link>
        </div>
        <form @submit.prevent="update">
            <div class="mb-2">
                <input v-model="title" class="w-full border rounded-full border-cyan-500" type="text" placeholder="title">
            </div>
            <div>
                <textarea v-model="content" class="w-full border rounded-full border-cyan-500" placeholder="content"></textarea>
            </div>
            <div>
                <button class="ml-auto hover:text-cyan-500 hover:bg-white border border-cyan-500 block p-2 w-32 bg-cyan-500 rounded-full text-center text-white" type="submit">Update</button>
            </div>
        </form>

</template>
<script>
import {Link} from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
export default {
    name: "Create",
    components :{
        Link
    },
    layout: MainLayout,
    data() {
        return {
            id: this.post.id,
            title: this.post.title,
            content: this.post.content,
        };
    },

    props: [
        'post'
    ],

    methods: {
        update(){
           this.$inertia.patch(`/posts/${this.id}`, {title: this.title, content: this.content})
        }
    },
}
</script>
<style scoped>
</style>