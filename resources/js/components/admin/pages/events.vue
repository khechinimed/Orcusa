<template>
    <div>
        <div class="content">
			<div class="container-fluid">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <form>
                            <div class="form-group">
                                <label for="event_name">Titre de l'évènement</label>
                                <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name">
                            </div>
                            <div class="form-group">
                                <label for="event_name">Description</label>
                                <textarea type="text" id="event_name" class="form-control" v-model="newEvent.event_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="event_name">Image</label>
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
                                    action="/event_image/upload"
                                >
                                    <Button icon="ios-cloud-upload-outline">Uploader l'image</Button>
                                </Upload>
                            </div>
                            <div class="demo-upload-list" v-if="newEvent.event_image">
                                <img :src="`${newEvent.event_image}`">
                                <div class="demo-upload-list-cover" >
                                    <Icon type="ios-trash-outline" @click="deleteImage"></Icon>
                                </div>
						    </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input
                                            type="datetime-local"
                                            id="start_date"
                                            class="form-control"
                                            v-model="newEvent.start_date"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="datetime-local" id="end_date" class="form-control" v-model="newEvent.end_date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4" v-if="addingMode">
                                    <Button type="primary" class="btn btn-sm btn-primary" @click="addNewEvent">Ajouter l'Évènement</Button>
                                </div>
                                <template v-if="updating">
                                    <div class="col-md-6 mb-4">
                                        <Button type="success" @click="updateEvent">Modifier</Button>
                                        <Button type="error" @click="deleteEvent">Supprimer</Button>
                                        <Button type="warning" @click="cancel">Annuler</Button>
                                    </div>
                                </template>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="calendrier p6">
                    <FullCalendar
                        :options="calendarOptions"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import TimeGridPlugin from '@fullcalendar/timegrid'
import ListPlugin from '@fullcalendar/list'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
        calendarOptions: {
            plugins: [ dayGridPlugin, interactionPlugin, ListPlugin, TimeGridPlugin],
            initialView: 'dayGridMonth',
            selectable: true,
            eventTimeFormat: true,
            locale: "fr",
            buttonText: {
                today: 'Aujourd\'hui'
            },
            eventClick: this.showEvent,
            events: [],
            
            
        },
        newEvent: {
            event_name: "",
            event_image: "",
            event_description: "",
            start_date: "",
            end_date: ""
        },
        addingMode: true,
        indexToUpdate: "",
        updating: false
    }
  },
  methods: {
    async getEvents(){
        const res = await this.callApi('get', '/api/calendar')
        if(res.status === 200){
            this.calendarOptions.events = res.data.data
        }else{
            this.swr()
        }
    },
    async addNewEvent(){
        if(this.newEvent.event_name.trim() == '') return this.e('Veuillez ajoutez un Event')
        if(this.newEvent.event_description.trim() == '') return this.e('Veuillez ajoutez une description')
        if(this.newEvent.start_date.trim() == '') return this.e("Date de l'Event ")
        if(this.newEvent.end_date.trim() == '') return this.e("Fin de l'event")
        
        const res = await this.callApi('post', '/api/calendar', this.newEvent)
        if(res.status === 201 || res.status === 200){
            this.calendarOptions.events.unshift(res.data.data);
            this.s('Event a bien été ajouté!')
            this.resetForm()

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
    showEvent(arg) {
        this.updating = true
        this.addingMode = false;
        const { id, title, description, image, start, end} =  this.calendarOptions.events.find(
            event => event.id === +arg.event.id
        );
  
        this.indexToUpdate = id;
        this.newEvent = {
            event_name: title,
            event_image: image,
            event_description: description,
        };
    },
    async updateEvent(){
        if(this.newEvent.event_name.trim() == '') return this.e('Veuillez ajoutez un Event')
        if(this.newEvent.event_description.trim() == '') return this.e('Veuillez ajoutez une description')

        const res = await this.callApi('put', "/api/calendar/" + this.indexToUpdate, this.newEvent)
        if(res.status === 201 || res.status === 200){
            this.calendarOptions.events.unshift(res.data.data);
            this.s('Event a bien été modifié!')
            this.resetForm()
            this.getEvents()
            this.addingMode = !this.addingMode
            this.updating = false
        }
    },
    async deleteEvent(){
        const res = await this.callApi('delete', "/api/calendar/" + this.indexToUpdate, this.newEvent)
        if(res.status === 200){    
            this.s('Event a bien été supprimé!')
        }
        this.resetForm();
        this.getEvents();
        this.addingMode = !this.addingMode;
    },
    resetForm() {
      Object.keys(this.newEvent).forEach(key => {
        return (this.newEvent[key] = "");
      });
    },
    cancel(){
        this.addingMode = !this.addingMode
        this.resetForm()
        this.updating = false
    },
    async deleteImage(){
        const res = await this.callApi("post", "event_image/delete", {
			image: this.newEvent.event_image
		});

        if(res.status === 200) {
            this.s('Image a été supprimé veuillez ajouter une autre!')
            this.$refs.uploads.clearFiles();
            this.newEvent.event_image = ""
        }
    },
    handleSuccess(res, file) {
        res = `/events_uploads/${res}`;
        this.$refs.uploads.clearFiles();
        if (this.addingMode) {
            return (this.newEvent.event_image = res);
        }
        this.newEvent.event_image = res;
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
    
  },

  async created(){
    this.token = window.Laravel.csrfToken
    this.getEvents()
  }
}
</script>