<template>
    <div class="wrap">
        <div class="search">
            <img src="">
            <form action="/">
                <input type="text" placeholder="请输入内容" v-model="msg">
                <input type="button" @click="skip" value="搜索">
            </form>
            <img>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/img_01.jpg"></div>
                <div class="swiper-slide"><img src="images/img_02.jpg"></div>
                <div class="swiper-slide"><img src="images/img_03.jpg"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
       <div class="list-group" v-for="item in list">
           <PostList :item="item"></PostList>
       </div>
        <h4 @click="fn" v-show="!noMore">查看更多</h4>
        <h4 v-show="noMore">暂无更多</h4>
        <div class="load_msg" v-show="isLoading">Loading...</div>
    </div>

</template>

<script>
    import PostList from "./PostList";
    export default {
        name: "Post",
        data:function(){
            return{
                page:1,
                list:[],
                url:'/m_post',
                finish:false,
                isLoading:false,
                noMore:false,
                msg:''
            }
        },
        components:{
            PostList
        },
        methods:{
            getMore:function (page) {
                if(this.finish){
                    return
                }
                this.isLoading=true;

                axios.get(this.url)
                    .then(res=>{
                        this.isLoading = false;
                        if(page==1){
                            this.list = res.data;
                        }else{
                            console.log(this.page)
                            if(res.data.length <1){
                                this.isLoading = false;
                                this.finish = true;
                                this.noMore = true;
                                return
                            }
                            this.list = this.list.concat(res.data);
                        }
                        page++;
                        this.page = page;
                        this.url = '/m_post?page='+page;
                    })
            },
            fn:function () {
                this.getMore(this.page);
            },
            skip:function(){
                this.$router.push({name:'searchPost',params:{msg:this.msg}});
            },
            start:function(){
                var wrap = document.getElementsByClassName('wrap')[0];
                var rootE = document.documentElement;
                var that = this;
                window.onscroll = function () {
                    var wrapH =wrap.scrollHeight;
                    var scrollTop = rootE.scrollTop||document.body.scrollTop;
                    var SH = rootE.clientHeight+scrollTop;
                    if(SH>=wrapH){
                        that.getMore(that.page)
                    }
                }
            }
        },
        created:function(){
            this.getMore(1);

        },
        mounted:function(){
            this.start();
            new Swiper ('.swiper-container', {
                direction: 'horizontal',
                loop: true,
                autoplay:1000,
                pagination: '.swiper-pagination',
            });
        },
    }
</script>

<style scoped>
    .wrap{
        padding-bottom: 2rem;
    }
    .wrap .search{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .wrap .search .form input{
        border: none;

    }
    .swiper-container{
        height: 3.5rem;
    }

    .wrap .list-group{
        padding-top: .1rem;
        padding-bottom: 0;
        margin: 0;
    }
    .wrap .list-group dl p{
        margin-bottom: 0;
    }
    .wrap h4{
        text-align: center;
    }
    .wrap .load_msg{
        text-align: center;
    }
</style>