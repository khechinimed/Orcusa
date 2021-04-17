<template>
    <div>
        <div class="donation_banner">
            <h2>Nous Soutenir</h2>
            <h3>Ayez un impact</h3>
            <div class="options">
                <section class="adherant">
                    <Button @click="modal1 = true">Display dialog box</Button>
                </section>
                <Modal
                    v-model="modal1"
                    title="Common Modal dialog box title"
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
                    <Button @click="modal1 = true">Display dialog box</Button>
                </section>
                <Modal
                    v-model="modal1"
                    title="Common Modal dialog box title"
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