<template>
    <div class="contact-us">
        <div class="container">
            <h2>Contactez-nous</h2>
            <h3>Pour toute question ou remarque, écrivez-nous un message.</h3>

            <div class="contact-form shadow">
                 <div class="row">
                    <div class="formulaire col-md-8">
                        <form class="form">
                            <div class="form-field col x-50">
                                <input id="name" class="input-text" type="text" required>
                                <label class="label" for="name">Name</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" class="input-text" type="email" required>
                                <label class="label" for="email">E-mail</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" class="input-text" type="email" required>
                                <label class="label" for="email">Phone</label>
                            </div>
                            <div class="form-field select col x-50">                
                                <select name="demande" id="demande">
                                    <option value="rdv">Prise de rdv</option>
                                    <option value="adherent">Devenir adhérent</option>
                                    <option value="benevole">Devenir bénévole</option>
                                    <option value="autre">Autre</option>
                                </select>
                                <label class="label" for="email">Demande concerne</label>
                            </div>
                            <div class="form-field col x-100">
                                <input id="message" class="input-text" type="text" required>
                                <label class="label" for="message">Message</label>
                            </div>
                            <div class="form-field col x-50 align-center">
                                <input class="submit-btn" type="submit" value="Envoyer">
                            </div>
                        </form>
                    </div>
                    <div class="infos col-6 col-md-4">
                        <h4>Informations de contact</h4>
                        <p>Remplissdez le formulaire et notre équipe vous répondra dans  les 24 heures.</p>
                        <section>
                            <span><i class="fas fa-phone"></i>+33 6 28 48 67 95</span>
                            <span><i class="fas fa-envelope"></i>contact.ccomc@gmail.com</span>
                            <span><i class="fas fa-location-arrow"></i>ORCUSA, France</span>
                            <img :src="'/images/contact.svg'">
                        </section>
                    </div>
                </div>
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