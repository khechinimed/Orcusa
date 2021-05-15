<template>

    <div class="container">
		<ButtonGroup style="padding: 20px 0px;">
            <Button type="primary" to="/forum">
                <Icon type="ios-arrow-back" />
                Revenir en arrière
            </Button>
        </ButtonGroup>
		<div class="post-content" v-if="post">
			<div class="col-lg-12" style="padding-right: 0px; padding-left: 0px;margin-bottom: 120px;">
				<!-- Title-->
				<h1 class="mt-2 mb-3" style="font-size: 50px; font-family: 'Anton';">{{post.title}}</h1>
				<hr>
				<!-- Date and time-->
				<p class="pt-1 pb-1">{{post.publish_date|formatDate}}</p>
				<hr>
				<!-- Post content-->
				<p class="lead mt-4" v-html="post.body" style="text-align: center;"></p>

				<!-- Comments form-->
				<!-- <div class="card my-4">
					<h5 class="card-header">Leave a Comment:</h5>
					<div class="card-body">
						<form>
							<div class="form-group"><textarea class="form-control" rows="3"></textarea></div>
							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>
				</div> -->
			</div>
			
		</div>
        <div v-else>
			<h2>Error 404</h2>
			<p>Ce Post n'existe pas ou a été supprimé</p>
		</div>
    </div>
</template>
<script>
export default {
	data(){
		return{
			data: {},
			post: {}
		}
	},
	async created(){
        this.token = window.Laravel.csrfToken
		
		let currentUrl = window.location.pathname;
		let ar = _.split(currentUrl, '/');
        const res = await this.callApi('get', '/app/post/'+_.last(ar))
		if(res.status === 200){
		 	this.post = res.data
		}else{
		 	this.swr()
		}
	}

}
</script>
</script>