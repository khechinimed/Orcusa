<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0"><Button @click="addModal=true"><Icon type="md-add"/>Ajouter un Membre</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
                                <th>Image</th>
								<th>FullName</th>
								<th>Email</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(user, i) in users" :key="i">
								<td>{{user.id}}</td>
								<td class="userImage"><img v-bind:src="user.image"></td>
								<td class="">{{user.fullName}}</td>
								<td class="">{{user.email}}</td>
								<td class="">{{user.userType}}</td>
								<td>
									<Button type="info" size="small" @click="showEditModal(user, i)">Modifier</Button>
									<Button type="error" size="small" @click="showDeletingModal(user, i)" :loading="user.isDeleting">Supprimer</Button>
								</td>
							</tr>
								<!-- ITEMS -->

						</table>
					</div>
				</div>
				
				<!-- User adding modal -->
				<Modal
					v-model="addModal"
					title="Ajout d'un utilisateur"
					:mask-closable="false"
					:closable="false"
					>
                    <div class="space">
                        <Upload
                            ref="uploads"
							:multiple="false"
                            :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                            :on-success="handleSuccess"
                            :on-error="handleError"
                            :max-size="3048"
                            :format="['jpg','jpeg','png']"
                            :on-format-error="handleFormatError"
                            :on-exceeded-size="handleMaxSize" 
                            action="/app/upload"
                        >
                            <Button icon="ios-cloud-upload-outline">Upload fichier</Button>
                        </Upload>
                    </div>
                    <div class="space">
                        <Input type="text" v-model="data.fullName" placeholder="Nom Complet" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input type="email" v-model="data.email" placeholder="Email" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input type="password" v-model="data.password" placeholder="Mot de passe" style="width: 300px" />
                    </div>
					<div class="space">
                         <Select v-model="data.userType" style="width:200px" placeholder="Role de l'utilisateur">
                            <Option value="admin">Admin</Option>
                            <Option value="membre">Membre</Option>
                        </Select>
                    </div>
					<div class="space">
						<div class="demo-upload-list" v-if="data.image">
							<img :src="`${data.image}`">
							<div class="demo-upload-list-cover" >
								<Icon type="ios-trash-outline" @click="deleteImage"></Icon>
							</div>
						</div>
					</div>
					
					

					<div slot="footer">
						<Button type="default" @click="addModal=false">Fermer</Button>
						<Button type="primary" @click="addAdmin" :disabled='isAdding' :loading="isAdding">{{isAdding ? 'Ajout en cours...' : 'Ajout d\'un utilisateur'}}</Button>
					</div>
				</Modal>

				<!-- User editing modal -->
				<Modal
					v-model="editModal"
					title="Modifier utilisateur"
					:mask-closable="false"
					:closable="false"
					>
					<div class="space">
                        <Upload
                            ref="uploads"
							:multiple="false"
                            :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                            :on-success="handleSuccess"
                            :on-error="handleError"
                            :max-size="3048"
                            :format="['jpg','jpeg','png']"
                            :on-format-error="handleFormatError"
                            :on-exceeded-size="handleMaxSize" 
                            action="/app/upload"
                        >
                            <Button icon="ios-cloud-upload-outline">Upload fichier</Button>
                        </Upload>
                    </div>
                    <div class="space">
                        <Input type="text" v-model="editData.fullName" placeholder="Nom Complet" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input type="email" v-model="editData.email" placeholder="Email" style="width: 300px" />
                    </div>
                    <div class="space">
                        <Input type="password" v-model="editData.password" placeholder="Mot de passe" style="width: 300px" />
                    </div>
					<div class="space">
                         <Select v-model="editData.userType" style="width:200px" placeholder="Role de l'utilisateur">
                            <Option value="admin">Admin</Option>
                            <Option value="membre">Membre</Option>
                        </Select>
                    </div>

					<div class="space">
						<div class="demo-upload-list" v-if="data.image">
							<img :src="`${data.image}`">
							<div class="demo-upload-list-cover" >
								<Icon type="ios-trash-outline" @click="deleteImage"></Icon>
							</div>
						</div>
					</div>

					<div slot="footer"> 
						<Button type="default" @click="editModal=false">Fermer</Button>
						<Button type="primary" @click="editAdmin" :disabled='isAdding' :loading="isAdding">{{isAdding ? 'Modification...' : 'Modification Utilisateur '}}</Button>
					</div>
				</Modal>

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
						<Button type="error" size="large" long :loading="isDeleting" @click="DeleteUser">Supprimer</Button>
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
                password: '',
                userType: '',
                image: ''
			},
			addModal: false,
			editModal: false,
			showDeleteModal: false,
			isAdding: false,
			users: [],
			editData: {
				fullName: '',
                email: '',
                password: '',
                userType: '',
                image: ''
			},
            token: '',
			index: -1,
			isDeleting: false,
			deleteItem: {},
			deletingIndex: -1,
            isIconImageNew: false,
		}
	},
	methods: {
		async addAdmin(){
            if(this.data.image.trim() == '') return this.e('Icon image is required')
			if(this.data.fullName.trim() == '') return this.e('User name is required')
			if(this.data.email.trim() == '') return this.e('Email is required')
			if(this.data.password.trim() == '') return this.e('Password is required')
			if(!this.data.userType.trim()) return this.e('UserType is required')

            this.data.image = `${this.data.image}`
			
			const res = await this.callApi('post', 'app/create_user', this.data)
			if(res.status === 201 || res.status === 200){
				this.users.unshift(res.data);
				this.s('Admin user has been added succesfully!')
				this.addModal = false
                this.data.image = ''
				this.data.fullName = ''
				this.data.email = ''
				this.data.password = ''
				this.data.userType = ''

				this.$refs.uploads.clearFiles()
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
		async editAdmin(){
			if(this.editData.fullName.trim() == '') return this.e('User name is required')
			if(this.editData.email.trim() == '') return this.e('Email is required')
			if(!this.editData.userType.trim()) return this.e('UserType is required')

			this.editData.image = `${this.data.image}`
			
			const res = await this.callApi('post', 'app/edit_user', this.editData)
			if(res.status === 200){
				this.users[this.index] = this.editData
				this.s('User has been edited succesfully!')
				this.editModal = false
				this.$refs.uploads.clearFiles()
			}else{
				if(res.status == 422){
					for(let i in res.data.errors){
                        this.e(res.data.errors[i][0])
                    }
				}else{
					this.swr()
				} 
			}
		},
		showEditModal(user, index){
			let obj = {
				id: user.id,
				fullName: user.fullName,
                email: user.email,
                userType: user.userType
			}
			this.editData = obj
			this.editModal = true
			this.index = index
		},
		async DeleteUser(){
			
			this.isDeleting = true
			const res = await this.callApi('post', 'app/delete_user', this.deleteItem)
			if(res.status === 200){
				this.showDeleteModal = false
				this.users.splice(this.deletingIndex, 1)
				this.s('Utilisateur supprimé avec succès')
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
        handleSuccess(res, file) {
			res = `/uploads/${res}`;
			this.$refs.uploads.clearFiles();
			if (this.isEditingItem) {
				return (this.editData.image = res);
			}
			this.data.image = res;
    	},

        handleError (res, file) {
            this.$Notice.warning({
                title: 'Format du fichier incorrect',
                desc: `${file.errors.file.length ? file.errors.file[0] : 'Something went wrong'}`
            });
        },
        handleFormatError (file) {
            this.$Notice.warning({
                title: 'Format du fichier incorrect',
                desc: 'Format du ' + file.name + ' est incorrect, veuillez choisir jpg ou png.'
            });
        },
        handleMaxSize (file) {
            this.$Notice.warning({
                title: "Veuillez changer la taille de l'image",
                desc: 'Fichier  ' + file.name + ' est volumineux, taille max est 2M.'
            });
        },
        async deleteImage(isAdd = true) {
			let image;
			if (!isAdd) {
				// for editing....
				this.isIconImageNew = true;
				image = this.editData.image;
				this.editData.image = "";
				this.$refs.editDataUploads.clearFiles();
			} else {
				image = this.data.image;
				this.data.image = "";
				this.$refs.uploads.clearFiles();
			}
			const res = await this.callApi("post", "app/delete_image", {
				image: image
			});
			if (res.status != 200) {
				this.data.image = image;
				this.swr();
			}
		},
	},

	async created(){
        this.token = window.Laravel.csrfToken
		const res = await this.callApi('get', 'app/get_users')
		if(res.status === 200){
			this.users = res.data
		}else{
			this.swr()
		}
	}

}
</script>

<style scoped>
	.userImage{
		width: 75px;
		height: 80px;
	}
</style>