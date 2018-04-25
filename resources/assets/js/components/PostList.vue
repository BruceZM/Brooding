<template>
    <router-link tag="dl" class="clear" :to="{name:'detail',params:{id:item.id}}">
        <dd>
            <p>{{item.title}}</p>
            <p>作者：{{item.name}} </p>
            <p>日期：{{item.updated_at}}</p>

        </dd>
        <dt>
            <img src="/upload/1523236979.jpg" >
        </dt>
    </router-link>

</template>

<script>
    export default {
        props:['item'],
        name: "PostList",
        created:function(){

        }
    }
</script>

<style scoped>
    .clear{
        height: 100%;
        border-bottom: 1px dotted gray;
    }
    .clear dd{
        width: 80%;
        height: 100%;
        float: left;
    }
    .clear img{
        width: 100%;
        float: right;
    }


    .clear dt{
        width: 20%;
        height: 100%;
        float: left;
    }

</style>