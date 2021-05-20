<template>
    <div class="forum">
        <div class="container">
            <div class="login">
                
            </div>
            <div class="forum-section">
                <h2>BLOG</h2>
                <div class="row mb-2">
                    <div class="col-md-6" v-for="post in posts.data" :key="post.id">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col d-flex flex-column position-static p-0" >
                                <div class="col-auto d-none d-lg-block" style="padding: 0px;">
                                    <img :src="`${post.featured_image}`" width="100%" height="100%">
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-0">{{post.title}}</h3>
                                    <div class="mb-1 text-muted">{{post.publish_date|formatDate}}</div>
                                    <router-link :to="{name:'post', params: {slug: post.slug}}" class="stretched-link">Lire la suite</router-link>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <pagination :data="posts" @pagination-change-page="getResults" style="padding: 20px;">
                        <span slot="prev-nav">&lt; Previous</span>
	                    <span slot="next-nav">Next &gt;</span>
                    </pagination>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</template>

<script>

export default {
	data(){
		return{
			data: {},
			posts: {},
			
		}
	},
	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
            console.log(page);
			axios.get('app/get_posts?page=' + page)
				.then(response => {
					this.posts = response.data;
				});
		}
	},

    filters: {
            truncate: function(value) {
                if (value && value.length > 20) {
                    value = value.substring(0, 90) + '...';
                }
                return value
            }
    },

    mounted() {
		// Fetch initial results
		this.getResults();
	},
    

	async created(){
        this.token = window.Laravel.csrfToken
        // const res = await this.callApi('get', 'app/get_posts')
		// if(res.status === 200){
		// 	this.users = res.data
		// }else{
		// 	this.swr()
		// }
	}

}
</script>