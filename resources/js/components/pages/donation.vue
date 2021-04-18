<template>
    <div>
        <div class="donation_banner">
            <h2>Nous Soutenir</h2>
            <h3>Ayez un impact</h3>
            <div class="options">
                <section class="adherant">
                    <Button @click="modal1 = true">Devenir adhérent</Button>
                </section>
                <Modal
                    v-model="modal1"
                    title="Devenir adhérent"
                >
                    <p>Content of dialog</p>
                    <p>Content of dialog</p>
                    <p>Content of dialog</p>
                    <div slot="footer">
                        <Button type="text" size="large" @click="modal1 = false">Quitter</Button>
                        <Button type="primary" size="large">Continuer</Button>
                    </div>
                </Modal>
                <section class="don">
                    <Button @click="modal1 = true">Faire un Don</Button>
                </section>
                <Modal
                    v-model="modal1"
                    title="Faire un Don"
                >
                    <p>Content of dialog</p>
                    <p>Content of dialog</p>
                    <p>Content of dialog</p>
                    <div slot="footer">
                        <Button type="text" size="large" @click="modal1 = false">Quitter</Button>
                        <Button type="primary" size="large">Continuer</Button>
                    </div>
                </Modal>
            </div>   
        </div>
        <div class="joinus">
            <div class="container">
                <h2>Rejoingnez notre association</h2>

                <div class="row">
                    <div class="col-md-4">
                        <img :src="'/images/joinus.jpg'">
                    </div>
                    <div class="col-md-6">
                        <h4>Why de we use it ?</h4>
                        <br>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
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
                modal1: false
            }
        },
        methods: {
            
        }
    }
</script>