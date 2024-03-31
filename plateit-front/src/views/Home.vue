<template>
    <MainLayout>
        <div class="home">
        <h1>Welcome to Home Page</h1>
       
    </div>
    </MainLayout>

</template>

<script>
import  MainLayout  from "../components/MainLayout.vue";
export default {
    name: 'Home',
    data() {
        return {
            // Add your data properties here
        };
    },
    components:{
        MainLayout,
    },
    methods: {
        // Add your methods here
    },
    computed: {
        // Add your computed properties here
    },
};
</script>

