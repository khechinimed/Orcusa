export default{
    data(){
        return{

        }
    },
    methods:{
        callApi(method, url, dataObj){
            try{
                //send a Post request
                return axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            }catch(e){
                return e.response;
            }
        },


        // IVIEW ALERTS
        i(desc, title="Hey") {
            this.$Notice.info({
                title: title,
                desc: desc
            });
        },
        s(desc, title="Merci !") {
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        w (desc, title="Oops!") {
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        e (desc, title="Error!") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        swr (desc="Erreur! Veuillez réessayer!", title="Oops!") {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        }
    }
}