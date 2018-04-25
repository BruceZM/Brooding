<template>
    <span>
        <a href="#" v-if="isFavorited" >
            <span  class="fa fa-heart" @click.prevent="unFavorite(post)">取消收藏</span>
        </a>
        <a href="#" v-else >
            <span  class="fa fa-heart-o" @click.prevent="favorite(post)">收藏</span>
        </a>
    </span>
</template>

<script>

    export default {
        props: ['post', 'favorited'],
        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.favorited
        },

        methods: {
            // promise
            favorite(post) {
                axios.get('/favorite/'+post)
                    .then(res=>{
                        this.isFavorited=true;
                    })
            },
            unFavorite(post){
                axios.get("/unfavorite/"+post)
                    .then(res=>{
                        this.isFavorited=false;
                    })
            }

        }
    }

</script>