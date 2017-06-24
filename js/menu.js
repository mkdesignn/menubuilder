
var res = Vue.compile(document.getElementsByClassName("mk_menu_wrapper")[0].outerHTML);

new Vue({
    el:".mk_menu_wrapper",
    render: res.render,
    staticRenderFns: res.staticRenderFns,
    data:{
        current_color:null,
        style:null
    },
    methods:{
        openChild:function(e){

            if( e.currentTarget.parentElement.nextElementSibling.tagName == "UL" ){
                if( e.currentTarget.parentElement.nextElementSibling.classList.contains("slideDown") ){
                    e.currentTarget.parentElement.nextElementSibling.classList.remove("slideDown");
                    e.currentTarget.parentElement.nextElementSibling.classList.add("slideUp");
                }
                else{
                    e.currentTarget.parentElement.nextElementSibling.classList.add("slideDown");
                    e.currentTarget.parentElement.nextElementSibling.classList.remove("slideUp");
                }
            }
        },
        mouseOver:function(e){

            if( e.currentTarget.getAttribute("hover") != null ){
                var hover_color = e.currentTarget.getAttribute("hover"),
                    style = e.currentTarget.getAttribute("style");

                this.current_color = e.currentTarget.style.background;

                // replace attribute
                if( this.current_color != "" ){
                    style = style.replace("background: "+this.current_color+";", "");
                    this.style = style;
                }

                e.currentTarget.setAttribute("style", "background:"+hover_color+";"+style)
            }
        },
        mouseOut:function(e){

            if( e.currentTarget.getAttribute("hover") != null ){
                e.currentTarget.setAttribute("style", "background: "+this.current_color+";"+this.style)
            }

        }
    }
});