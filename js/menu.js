new Vue({

    el:".mk_menu_wrapper",
    mounted:function(){
        var menu = document.getElementsByClassName(".mk_menu_wrapper");
        console.log(menu);
        this.$compile(menu);
    },
    method:{
        openChild:function(){
            console.log("hello world")
        }
    }
});