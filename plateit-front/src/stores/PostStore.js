import { defineStore } from 'pinia'
import axios from 'axios'
import { MainStore } from './MainStore.js'
import { UserStore } from './UserStore.js'


export const PostStore = defineStore('PostStore', {
    state: () => ({
        posts: [],
        ProfilePosts: [],
        store: MainStore(),
        u_store: UserStore(),
        postLoading : false,
        posts_type: 'all'


    }),
    getters: {
        get_posts() {
            return this.posts
        },

    },
    actions: {
       async GetPosts(key) {
        this.postLoading = true;
            await axios.get(this.store.laravelApi + 'all_posts', {
                params: {
                    key: key,
                    type: this.posts_type
                }
            })
                .then(response => {
                    const posts = response.data.data;
                   
                    this.posts = posts;
                })
                .catch(error => {
                   
                    console.error(error);
                });
                this.postLoading = false;
    },
 
}

})