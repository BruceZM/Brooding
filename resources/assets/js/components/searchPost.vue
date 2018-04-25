<template>
    <div>
        <div v-for="item in list" class="list-group">
            <PostList :item="item"></PostList>
        </div>
    </div>
</template>

<script>
    import PostList from "./PostList";
    export default {
        name: "searchPost",
        data:function(){
            return{
                list:[]
            }
        },
        components:{
            PostList
        },
        created:function () {
            var msg = this.$route.params.msg;
            axios.get("m_search/"+msg)
                .then(res=>{
                    this.list = res.data;
                    console.log(this.list)
                })
        }

    }
</script>

<style scoped>

</style>