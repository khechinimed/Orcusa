<template>
    <div class="contact-us">
        <div class="container">
            <h2>Contactez-nous</h2>
            <h3>Pour toute question ou remarque, écrivez-nous un message.</h3>

            <div class="contact-form">
                 <div class="row">
                    <div class="formulaire col-md-8">
                        <form class="form row">
                            <div class="form-field col x-50">
                                <input id="name" class="input-text js-input" type="text" required>
                                <label class="label" for="name">Name</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" class="input-text js-input" type="email" required>
                                <label class="label" for="email">E-mail</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" class="input-text js-input" type="email" required>
                                <label class="label" for="email">Phone</label>
                            </div>
                            <div class="form-field col x-50">                
                                <select name="" id="">
                                    <option value="rdv">Prise de rdv</option>
                                    <option value="adherent">Devenir adhérent</option>
                                    <option value="benevole">Devenir bénévole</option>
                                </select>
                                <label class="label" for="email">Demande concerne</label>
                            </div>
                            <div class="form-field col x-100">
                                <input id="message" class="input-text js-input" type="text" required>
                                <label class="label" for="message">Message</label>
                            </div>
                            <div class="form-field col x-50 align-center">
                                <input class="submit-btn" type="submit" value="Submit">
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
        </div>
    </div>
</template>