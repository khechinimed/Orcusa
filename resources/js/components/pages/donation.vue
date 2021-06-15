<template>
    <div>
        <div class="donation_banner">
            <h2>Nous Soutenir</h2>
            <h3>Ayez un impact</h3>
            <div class="options">
                <section class="adherant">
                    <Button @click="modal2=true">Devenir adhérent</Button>
                </section>
                <Modal
                    v-model="modal2"
                    title="Devenir adhérent"
                >
                    <div class="space">
                        <Input v-model="data.fullName" type="text" placeholder="Nom Complet" style="width: 300px"/>
                    </div>
                    <div class="space">
                        <Input v-model="data.email" type="email" placeholder="Email" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input v-model="data.date" type="date" placeholder="Date De Naissance" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input v-model="data.ville" type="text" placeholder="Ville" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input v-model="data.adresse" type="text" placeholder="Adresse" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input v-model="data.telephone" type="number" placeholder="Numéro de téléphone" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input v-model="data.message" type="textarea" :autosize="{minRows: 3,maxRows: 6}" placeholder="Votre Message..." />
                    </div>
										
					<div slot="footer">
						<Button type="default" @click="modal2=false">Fermer</Button>
						<Button type="primary" @click="demande" :disabled='isAdding' :loading="isAdding">{{isAdding ? 'Envoi en cours...' : 'Envoyer'}}</Button>
					</div>
                </Modal>
                <section class="don">
                    <Button @click="modal1 = true">Faire un Don</Button>
                </section>
                <Modal
                    class="don-modal"
                    v-model="modal1"
                    title="Faire un Don"
                    width="800px"                    
                >
                    <iframe id="haWidget" allowtransparency="true" scrolling="auto" src="https://www.helloasso.com/associations/orcusa/formulaires/2/widget" style="width:100%;height:750px;border:none;" onload="window.scroll(0, this.offsetTop)"></iframe>
                    <div slot="footer">
                        <Button type="text" size="large" @click="modal1 = false">Quitter</Button>
                    </div>
                </Modal>
            </div>   
        </div>
        <div class="joinus">
            <div class="container">
                <h2>Rejoignez notre association</h2>

                <div class="row">
                    <div class="col-md-4">
                        <img :src="'/images/joinus.jpg'">
                    </div>
                    <div class="col-md-6">
                        <h4>VOUS SOUHAITEZ NOUS AIDER, NOUS SOUTENIR, PARTICIPER ?</h4>
                        <br>
                        <p>Votre adhésion est gratuite et est indépendante des dons qui peuvent également être envoyés par les particuliers ou les entreprises.<br> Les dons sont utilisés uniquement pour aider l'organisation logistique des gamers en situation de handicap afin de leur permettre d'assister aux événements proposés (frais de déplacement, aide au logement, besoin d'assistance etc...)<br><br>Merci pour votre aide !</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h4>Why de we use it ?</h4>
                        <br>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                    <div class="col-sm-6">
                        <img :src="'/images/joinus2.jpg'">
                    </div>
                </div>
            </div>
            


        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                data: {
                    fullName: '',
                    email: '',
                    date:'',
                    ville: '',
                    adresse: '',
                    telephone: '',
                    message: ''
                },
                modal1: false,
                modal2: false,
                isAdding: false,
            }
        },
        methods: {
            async demande(){
            if(this.data.fullName.trim() == '') return this.e('Veuillez ajoutez votre Nom svp !')
			if(this.data.email.trim() == '') return this.e('Veuillez ajoutez votre Email svp !')
			if(this.data.date.trim() == '') return this.e('Veuillez ajoutez votre Date de naissance svp !')
			if(this.data.ville.trim() == '') return this.e('Veuillez ajoutez votre Ville svp !')
			if(this.data.adresse.trim() == '') return this.e('Veuillez ajoutez votre Adresse svp !')
			if(!this.data.telephone.trim()) return this.e('Veuillez ajoutez votre Numero de telephone svp !')
			if(!this.data.message.trim()) return this.e('Veuillez ajoutez Un Message svp !')
			
			const res = await this.callApi('post', 'app/demande', this.data)
			if(res.status === 201 || res.status === 200){
				this.s('Votre demande a bien été envoyer !')
				this.modal2 = false
                this.data.fullName = ''
				this.data.email = ''
				this.data.date = ''
				this.data.ville = ''
				this.data.adresse = ''
				this.data.telephone = ''
				this.data.message = ''
			}else{
				if(res.status==422){
                    for(let i in res.data.errors){
                        this.e(res.data.errors[i][0])
                    }
				}else{
					this.swr()
				}
			}
		},
        }
    }
</script>