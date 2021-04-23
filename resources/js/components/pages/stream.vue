<template>
    <div class="stream-page">
        <div class="container">
            <h2>STREAM</h2>

            <div class="row">
                <div class="embed-responsive embed-responsive-21by9">
                    <div id="twitch-embed"></div>
                </div>
            </div>
            <div class="donation">
                <a href="https://streamlabs.com/orcusa2" target="_blank">Nous Soutenir</a>
            </div>
            <section class="social-media">
                <a target="_blank" href="https://www.facebook.com/Orcusaasso/"><i class="fab fa-facebook-square"></i></a>
                <a target="_blank" href="https://www.instagram.com/orcusa_off"><i class="fab fa-instagram"></i></a>
                <a target="_blank" href="https://twitter.com/Orcusa2"><i class="fab fa-twitter"></i></a>
                <a target="_blank" href="https://discord.gg/E6Ht7Yxn"><i class="fab fa-discord"></i></a>
                <a target="_blank" href="https://www.twitch.tv/orcusa2"><i class="fab fa-twitch"></i></a>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },  
    methods: {
        loadTwitch(){
            var embed = new Twitch.Embed("twitch-embed", {
            width: 854,
            height: 480,
            channel: "orcusa2",
            layout: "video-with-chat",
            autoplay: false,
            // only needed if your site is also embedded on embed.example.com and othersite.example.com 
            
            });
        
            embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                var player = embed.getPlayer();
                player.play();
            });
        }
    },
    mounted(){
        this.loadTwitch();
    }
}
</script>