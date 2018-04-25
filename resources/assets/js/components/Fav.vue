<template>
   <div class="ii">
      <div class="list-group" v-for="item in list">
          <PostList :item="item"></PostList>

      </div>
   </div>
</template>

<script>
    import PostList from "./PostList";
    export default {
        name: "Fav",
        data:function(){
            return{
                list:[]
            }
        },
        components:{
          PostList
        },
        created(){
            axios.get("/m_myfavorite")
                .then(res=>{
                     this.list = res.data;
                })
        },
    }

</script>

<style scoped>

</style>