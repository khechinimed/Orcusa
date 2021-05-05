<template>
    <div>
        <div class="association_banner">
            <div class="container">
                <h2>L'espoir vient du cœur</h2>
                <h3>Orcusa vous souhaite la bienvenue</h3>
                <div class="row">
                    <div class="col">
                        <p>Président</p>
                        <p>president@gmail.com</p>
                    </div>
                    <div class="col">
                        <p>Communication</p>
                        <p>president@gmail.com</p>
                    </div>
                    <div class="col">
                        <p>Marketing</p>
                        <p>marketing@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="dirigeants">
            <div class="container">
                <h2>Nos Dirigeants</h2>

                <div class="container">
                    <div class="row">
                        <div v-for="(user, i) in users" :key="i" class="col-md-3 col-sm-6">
                            <div class="our-team"  v-if="user.userType == 'admin'">
                                <div class="pic">
                                    <img v-bind:src="user.image">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{user.fullName}}</h3>
                                    <span class="post">Président</span>
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
                        <div v-for="member in data.members" :key="member" class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="images/user1.png">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">Mathias Pora</h3>
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
            data: {
                members: 8
            },
            users: [],
        }
    },
	async created(){
        this.token = window.Laravel.csrfToken
		const res = await this.callApi('get', 'app/get_users')
		if(res.status === 200){
			this.users = res.data
		}else{
			this.swr()
		}
	}
}
</script>