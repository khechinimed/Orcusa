<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><router-link to="/" class="nav-link">Accueil</router-link></li>
                        <li class="nav-item"><router-link to="/association" class="nav-link">L'association</router-link></li>
                        <li class="nav-item"><router-link to="/evenements" class="nav-link">Évènements</router-link></li>
                        <li class="nav-item"><router-link to="/donation" class="nav-link">Vous engager &#38; donation</router-link></li>
                        <li class="nav-item"><router-link to="/stream" class="nav-link">STREAM</router-link></li>
                        <li class="nav-item"><router-link to="/blog" class="nav-link">BLOG</router-link></li>
                        <li class="nav-item"><router-link to="/contact" class="nav-link">Contactez-nous</router-link></li>
                    </ul>
                </div>
                <h2 class="d-flex nav_title">ORCUSA</h2>
            </div>
        </nav>
        <router-view/>
    </div>
</template>

