<template>
    <div>
        <div class="association_banner">
            <div class="container">
                <h2>L'espoir vient du cœur</h2>
                <h3>Orcusa vous souhaite la bienvenue</h3>
                <div class="row">
                    <div class="col">
                        <p>Président</p>
                        <p>presidence@orcusa.fr</p>
                    </div> 
                    <div class="col">
                        <p>Communication</p>
                        <p>communication@orcusa.fr</p>
                    </div>
                    <div class="col">
                        <p>Marketing</p>
                        <p>marketing@orcusa.fr</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="dirigeants">
            <div class="container">
                <h2>Nos Dirigeants</h2>

                <div class="container">
                    <div class="row">
                        <div v-for="(user, i) in admins" :key="i" class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img v-bind:src="user.image">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{user.fullName}}</h3>
                                    <span class="post"></span>
                                </div>
                                <ul class="social">
                                    <li><a target="_blank" href="https://www.facebook.com/Orcusaasso" class="fab fa-facebook"></a></li>
                                    <li><a target="_blank" href="https://twitter.com/Orcusa2" class="fab fa-twitter"></a></li>
                                    <li><a target="_blank" href="https://www.instagram.com/orcusa_off" class="fab fa-instagram"></a></li>
                                    <li><a target="_blank" href="https://www.linkedin.com/in/matthias-p-3ba296208/" class="fab fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <hr>
        <div class="membres dirigeants">
            <div class="container">
                <h2>Membres de l'association</h2>

                <div class="container">
                    <div class="row">
                        <div v-for="(user, i) in membres" :key="i" class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img v-bind:src="user.image">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{user.fullName}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <hr>

        <div class="partenaire">
            <div class="container">
                <h2>Nos partenaires</h2>
                <h3>Ils nous font confiance, et nous aussi !</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            admins: [],
            membres: []
        }
    },
	async created(){
        this.token = window.Laravel.csrfToken
		const res = await this.callApi('get', 'app/get_users')
		if(res.status === 200){
			this.admins = res.data.filter(function (user) {
                return user.userType == 'admin'
            })

            this.membres = res.data.filter(function (user) {
                return user.userType == 'membre'
            })
		}else{
			this.swr()
		}
	},
    
}
</script>