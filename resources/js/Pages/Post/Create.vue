<template>
    <div class="mx-auto w-1/2">
        <div class="mb-4">
            <h3 class="text-xl">Додати пост</h3>
        </div>
        <div>
            <div>
                <div class="mb-4">
                    <input @keyup="storeCache" type="text" class="border border-gray-300 borde" v-model="title">
                </div>
                <div class="mb-4">
                    <input @keyup="storeCache" type="text" class="border border-gray-300 borde" v-model="content">
                </div>
                <div class="mb-4">
                    <input @keyup="storeCache" type="text" class="border border-gray-300 borde" v-model="day_for_create">
                </div>
                <div class="mb-4">
                    <a @click.prevent="store" href="#" class="inline-block px-4 py-2 text-white bg-sky-700">Додати</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import axios from "axios";

export default {
    name:"Create",
    layout: MainLayout,

    data() {
        return{
            'title' : '',
            'content' : '',
            'day_for_create' : 0,

        }
    },

    props: [
        'cache'
    ],
 

    mounted(){
        if(this.cache){
            this.title  = this.cache.title
            this.content = this.cache.content
            this.day_for_create = this.cache.day_for_create
        }
    },

    methods: {
        store() {
            axios.post('/posts', {
                title : this.title,
                content : this.content,
                day_for_create : this.day_for_create
            }).then(res => {
                this.title = ''
                this.content = ''
                this.day_for_create = 0
            })
        },

        storeCache(){
            axios.post('/posts/cache', {
                title : this.title,
                content : this.content,
                day_for_create : this.day_for_create
            }).then(res => {
                console.log(res);
            })
            console.log(this.cache)
        },
    },
}
</script>
<style scoped>
</style>