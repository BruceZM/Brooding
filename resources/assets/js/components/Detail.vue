<template>
    <div class="dett">
        <img src="images/img_03.jpg">
        <h3>{{list.title}}</h3>
        <div class="content">
            <span>{{list.name}}</span>
            <span>{{list.updated_at}}</span>
        </div>
        <p>{{list.body}}</p>
    </div>
</template>

<script>
    export default {
        name: "Detail",
        data:function(){
            return{
                list:{},
            }
        },
        created:function () {

            var _id = this.$route.params.id;
            axios.get("/m_detail/"+_id)
                .then(res=>{
                    this.list = res.data;
                    console.log(this.list)
                })
            }

    }
</script>

<style scoped>
.dett{
    padding: .1rem;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
}
.dett img{
    height: 4rem;
}
.dett h3{
    font-size: .36rem;
    margin-top: .3rem;
    text-align: center;
}
    .dett .content{
        margin-top: .3rem;
        padding: 0 .1rem;
        display: flex;
        justify-content: space-around;
    }
.dett p{
    margin-top: .3rem;
}
</style>