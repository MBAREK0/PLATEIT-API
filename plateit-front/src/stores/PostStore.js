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
        posts_type: 'all',
        saved_posts_ids: []


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
   async get_saved_posts_ids(){
       await axios.get(this.store.laravelApi + 'get_saved_posts_ids')
        .then((response) => {
            if(response && response.status === 200){
                console.log('saved posts ids',response.data.data);
                    this.saved_posts_ids = response.data.data  
            }
        })
        .catch((error) => {
            console.error('Error:', error.message);
            
        });
    } 
    ,
    async visite_rewards_from_profile(id){
        await axios.post(this.store.laravelApi + 'visite_rewards_from_profile',
    {
        restaurant_id:id
    }
    )
         .then((response) => {
             if(response && response.status === 200){
                 console.log('visite_rewards_from_profile',response.data.data);
              
                   
             }
         })
         .catch((error) => {
             console.error('Error:', error.message);
          

             
         });
     } 
}

})