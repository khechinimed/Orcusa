<template>
    <div class="contact-us">
        <div class="container">
            <h2>Contactez-nous</h2>
            <h3>Pour toute question ou remarque, écrivez-nous un message.</h3>

            <div class="contact-form shadow">
                 <div class="row">
                    <div class="formulaire col-md-8">
                        <form class="form" @submit.prevent="sendContact">
                            <div class="form-field col x-50">
                                <input id="name" v-model="form.name" class="input-text" type="text" autocomplete="off" required>
                                <label class="label" for="name">Nom complet</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" v-model="form.email" class="input-text" type="email" autocomplete="off" required>
                                <label class="label" for="email">E-mail</label>
                            </div>
                            <div class="form-field col x-50">
                                <input id="email" class="input-text" v-model="form.phone" type="tel" autocomplete="off" required>
                                <label class="label" for="email">Phone</label>
                            </div>
                            <div class="form-field select col x-50">                
                                <select name="demande" v-model="form.demande" id="demande" required>
                                    <option value="Rendez-vous">Prise de rdv</option>
                                    <option value="Devenir Adherent">Devenir adhérent</option>
                                    <option value="Devenir Benevole">Devenir bénévole</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <label class="label" for="demande">Demande concerne</label>
                            </div>
                            <div class="form-field textarea col x-100">
                                <textarea id="message" class="input-text" v-model="form.message" cols="60" rows="20" maxlength="300" type="text" autocomplete="off" required></textarea>
                                <label class="label" for="message">Message</label>
                            </div>
                            <div class="form-field col x-50 align-center">
                                <button class="submit-btn" type="submit">Envoyer</button>
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

<script>
export default {
    data(){
        return{
            form: {
                name: '',
                email: '',
                phone: '',
                demande: '',
                message: ''
            },
        }
    },

    methods: {
        async sendContact(){

            const res = await this.callApi('post', '/api/send-contact', this.form);

            if(res.status === 200){
				this.s('Votre Message a bien été envoyé!')
			}else{
				if(res.status == 422){
					this.swr()
				}
                this.swr()
			}

            this.clearForm();
        },
        clearForm(){
            this.form.name = '';
            this.form.email = '';
            this.form.phone = '';
            this.form.demande = '';
            this.form.message = '';
        }
    }
}
</script>