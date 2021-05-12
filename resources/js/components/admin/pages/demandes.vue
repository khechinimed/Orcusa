<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>FullName</th>
								<th>Email</th>
								<th>Date de naissance</th>
								<th>Ville</th>
								<th>Adresse</th>
								<th>Telephone</th>
								<th>Message</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(demande, i) in demandes" :key="i">
								<td class="">{{demande.fullName}}</td>
								<td class="">{{demande.email}}</td>
								<td class="">{{demande.date}}</td>
								<td class="">{{demande.ville}}</td>
								<td class="">{{demande.adresse}}</td>
								<td class="">{{demande.telephone}}</td>
								<td class="">{{demande.message}}</td>
								<td class="">{{demande.created_at|formatDate}}</td>
								<td>
									<Button type="error" size="small" @click="showDeletingModal(demande, i)" :loading="demande.isDeleting">Supprimer</Button>
								</td>
							</tr>
								<!-- ITEMS -->

						</table>
					</div>
				</div>
				
				
				<!-- User deleting modal -->		
				<Modal v-model="showDeleteModal" width="360">
					<p slot="header" style="color:#f60;text-align:center">
						<Icon type="ios-information-circle"></Icon>
						<span>Supprimer confirmation</span>
					</p>
					<div style="text-align:center">
						<p>Etes-vous sur de vouloir supprimer cet utilisateur?</p>
					</div>
					<div slot="footer">
						<Button type="error" size="large" long :loading="isDeleting" @click="DeleteDemande">Supprimer</Button>
					</div>
				</Modal>


			</div>
		</div>
    </div>
</template>

<script>
export default {
	data(){
		return{
			data: {
				fullName: '',
                email: '',
                date:'',
                ville: '',
                adresse: '',
                telephone: '',
                message: ''
			},
			showDeleteModal: false,
			isAdding: false,
			demandes: [],
            token: '',
			index: -1,
			isDeleting: false,
			deleteItem: {},
			deletingIndex: -1,
		}
	},
	methods: {
		
		async DeleteDemande(){
			
			this.isDeleting = true
			const res = await this.callApi('post', 'app/delete_demande', this.deleteItem)
			if(res.status === 200){
				this.showDeleteModal = false
				this.demandes.splice(this.deletingIndex, 1)
				this.s('Demande supprimé avec succès')
			}else{
				this.swr()
			}
			this.isDeleting = false
			

		},
		showDeletingModal(user, i){
			this.deleteItem = user
			this.deletingIndex = i
			this.showDeleteModal = true
		},
	},

	async created(){
        this.token = window.Laravel.csrfToken
		const res = await this.callApi('get', 'app/get_demandes')
		if(res.status === 200){
			this.demandes = res.data
		}else{
			this.swr()
		}
	}

}
</script>