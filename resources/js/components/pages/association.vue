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
                        <div class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="images/user1.png">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">Mathias Pora</h3>
                                    <span class="post">Président</span>
                                </div>
                                <ul class="social">
                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                    <li><a href="#" class="fab fa-google-plus"></a></li>
                                    <li><a href="#" class="fab fa-instagram"></a></li>
                                    <li><a href="#" class="fab fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="images/user2.png">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">Pierre Otuszewski</h3>
                                    <span class="post">Vice-président</span>
                                </div>
                                <ul class="social">
                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                    <li><a href="#" class="fab fa-google-plus"></a></li>
                                    <li><a href="#" class="fab fa-instagram"></a></li>
                                    <li><a href="#" class="fab fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="images/user1.png">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">Mathias Pora</h3>
                                    <span class="post">Président</span>
                                </div>
                                <ul class="social">
                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                    <li><a href="#" class="fab fa-google-plus"></a></li>
                                    <li><a href="#" class="fab fa-instagram"></a></li>
                                    <li><a href="#" class="fab fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="our-team">
                                <div class="pic">
                                    <img src="images/user2.png">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">Pierre Otuszewski</h3>
                                    <span class="post">Vice-président</span>
                                </div>
                                <ul class="social">
                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                    <li><a href="#" class="fab fa-google-plus"></a></li>
                                    <li><a href="#" class="fab fa-instagram"></a></li>
                                    <li><a href="#" class="fab fa-linkedin"></a></li>
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
            }
        }
    }
}
</script>