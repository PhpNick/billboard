<template>
    <div class="btn btn-info mt-2" v-on:click="favorite()"><i class="fas fa-heart text-danger"></i> {{ value }}</div>
</template>

<script>
    export default {
        data() {
            return {
                value: ''
            }
        }, 
        props: ['card'],
        methods: {
            favorite: function () {
                axios.get(`/favorite/card/${this.card}`)
                .then((response)=>{
                    this.value = response.data.value
                });
            }    
        },             
        mounted() {
            axios.get(`/is-favorited/card/${this.card}`)
            .then((response)=>{
                this.value = response.data.value
            });
        }
    }
</script>
