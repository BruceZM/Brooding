<template>
    <ul class="tab">
        <item title="用户" mark="fav" :sel="select" @res="getmark">
            <span class="glyphicon glyphicon-user" slot="icon"></span>
        </item>
        <item title="文章" mark="post" :sel="select" @res="getmark">
            <span class="glyphicon glyphicon-bookmark" slot="icon"></span>
        </item>
        <item title="消息" mark="msg" :sel="select" @res="getmark">
            <span class="glyphicon glyphicon-comment" slot="icon"></span>
        </item>
        <item title="我的" mark="about" :sel="select" @res="getmark">
            <span class="glyphicon glyphicon-cog" slot="icon"></span>
        </item>
    </ul>
</template>

<script>
    import item from "./ChildTab";
    export default {
        name: "ParentTab",
        components:{
            item
        },
        data(){
            return {
                select:"fav"
            }
        },
        methods:{
            getmark:function(mark){
                this.select = mark;
            }
        }
    }
</script>

<style scoped>

</style>