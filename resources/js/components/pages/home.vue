<template>
    <div class="home">
        <div class="banner">
            <div class="row">
                <div class="col">
                    <img class="banner_logo" :src="'/images/logo.png'">
                    <h1>ORCUSA</h1>
                    <div id="typed-strings">
                        <p>Une association<br> pour soutenir les gamers sensibiliser et animer</p>
                    </div>
                    <span id="typed"></span>
                    <a data-scroll href="javascript:void(0);" onclick="window.scroll(0,600);"><i class="fas fa-chevron-down"></i></a>
                    <section>
                        <a target="_blank" href="https://www.facebook.com/Orcusaasso/"><i class="fab fa-facebook-square"></i></a>
                        <a target="_blank" href="https://www.instagram.com/orcusa_off"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="https://twitter.com/Orcusa2"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="https://discord.gg/E6Ht7Yxn"><i class="fab fa-discord"></i></a>
                        <a target="_blank" href="https://www.twitch.tv/orcusa2"><i class="fab fa-twitch"></i></a>
                    </section>
                </div>
                <div class="col" id="banner_image">
                    <div class="banner_image">

                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter" id="newsletter">
            <div class="container">
                <h2>Newsletter</h2>
                <p>Recevez les nouveautés, actus et événements Orcusa !</p>
                <section>
                    <form @submit.prevent="subscribe" method="post">
                        <input v-model="newsletter.email" name="email" type="email" placeholder="Entrer votre email" required>
                        <button type="submit">Je m'inscris !</button>
                    </form>
                </section>
            </div>
        </div>
        
        <div class="actus" id="actus">
            <div class="container">
                <h2>Dernières Actus</h2>
                <div class="row mb-2">
                    <div class="col-md-6" v-for="post in posts.data" :key="post.id">
                        <div class="row g-0 border me-4 rounded overflow-hidden flex-md-row mb-4 m shadow-sm h-md-250 position-relative">
                            <div class="col d-flex flex-column position-static p-0" >
                                <div class="col-auto d-none d-lg-block" style="padding: 0px;">
                                    <img :src="`${post.featured_image}`" width="100%" height="100%">
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-0">{{post.title}}</h3>
                                    <div class="mb-1 text-muted">{{post.publish_date|formatDate}}</div>
                                    <router-link :to="`/post/${post.slug}`" class="stretched-link">Lire la suite</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="description">
            <div class="container">
                <h2>QUI SOMMES NOUS ?</h2>
                <section>
                    <p>Cette association a pour but d'aider les personnes en situation de handicap afin d'améliorer ou permettre de pouvoir accéder à l'univers du jeu vidéo via des logiciels ou matériels adaptés. Nous organisons des entretiens avec les personnes nous contactant pour faire un bilan de leurs situations en terme d'expériences vidéoludique et cherchons la meilleure solution a leurs besoins en termes de connectiques ou logiciels en fonction du type de jeux qu'ils jouent ou voudraient jouer. Nous organisons également des événements avec nos membres de l'association afin de partager un moment convivial entre nous ou des événements e-sport. 
                    <br><br>Notre but est de montrer que tout le monde peut s'amuser avec les jeux vidéos et que le handicap n'est pas un obstacle pour s'amuser, partager une expérience vidéoludique avec d'autres et montrer que les personnes handicapés peuvent très bien faire de l'e-sport.</p>
                </section>
            </div>
        </div>
        <img class="mannette" :src="'/images/mannette.svg'">

        <div class="nos_stream">
            <div class="container">
                <h2>NOS STREAMS</h2>
                <p>

                </p>
                <div class="row">
                    <div class="col embed-responsive embed-responsive-21by9">
                        <div id="twitch-embed"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="partie_faq">
            <div class="container">
                <h2>FAQ</h2>
                <div class="faqs-container" v-for="faq in faqs" :key="faq.id">
                    <div class="faq active">
                        <h3 class="faq-title">
                            {{faq.title}}
                        </h3>
                        <p class="faq-text">
                            {{faq.text}}
                        </p>
                        <!-- <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                            <i class="fas fa-times"></i>
                        </button> -->
                    </div>
                    
                   
            </div>
            </div>
        </div>
        <BackTop :height="100" :bottom="200">
            <div class="top"><Icon type="md-arrow-round-up" /></div>
        </BackTop>
    </div>
</template>

<script>

export default {
    data(){
        return {
            data: {},
            posts: {},
            faqs: {},
            newsletter: {
                email: '',                
            }
        }
    },  
    methods: {
        loadTwitch(){
            var embed = new Twitch.Embed("twitch-embed", {
                channel: "orcusa2",
                layout: "video",
                autoplay: false,
            });
        
            embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                var player = embed.getPlayer();
                player.play();
            });
        },

        async subscribe(){
            let res = await axios.post('/subscribe', {
                        email: this.newsletter.email,
                    });

            if(res.status === 200){
				this.s('Merci ! Vous êtes désormais abonné à notre newsletter!')
                this.newsletter.email = ''
			}else{
				this.swr();
			}
            
        },
        toggle(){
            document.querySelectorAll('.faq-toggle').forEach(toggle => {
                toggle.addEventListener('click', () => {
                    toggle.parentNode.classList.toggle('active');
                });
            }); 
        }
    },
    mounted(){
        this.loadTwitch();
        this.toggle();        
    },
    async created(){
        this.token = window.Laravel.csrfToken
        const res = await this.callApi('get', 'app/get_posts')
        if(res.status === 200){
		 	this.posts = res.data
		}else{
		 	this.swr()
		}

        const faq = await this.callApi('get', 'faq/get_faq')
        if(faq.status === 200){
		 	this.faqs = faq.data
		}else{
		 	this.swr()
		}
	}
}
</script>