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
                                    action="//jsonplaceholder.typicode.com/posts/"
                                    ref="uploads"
                                    :multiple="false"
                                    :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                                >
                                    <Button icon="ios-cloud-upload-outline">Uploader l'image</Button>
                                </Upload>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input
                                            type="date"
                                            id="start_date"
                                            class="form-control"
                                            v-model="newEvent.start_date"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <button class="btn btn-sm btn-primary" @click="addNewEvent">Ajouter l'Évènement</button>
                                </div>
                                <template>
                                    <div class="col-md-6 mb-4">
                                        <button class="btn btn-sm btn-success">Modifier</button>
                                        <button class="btn btn-sm btn-danger">Supprimer</button>
                                        <button class="btn btn-sm btn-secondary">Annuler</button>
                                    </div>
                                </template>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="calendrier p6">
                    <FullCalendar :options="calendarOptions" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
        calendarOptions: {
            plugins: [ dayGridPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            events: [
                { title: 'event 1', date: '2021-05-17' },
                { title: 'event 2', date: '2021-05-18' }
            ]
        },
        newEvent: {
            event_name: "",
            event_image: "",
            event_description: "",
            start_date: "",
            end_date: ""
        }
    }
  },
  methods: {
      getEvents(){
          
      },
      async addNewEvent(){
            if(this.newEvent.event_name.trim() == '') return this.e('Veuillez ajoutez un Event')
			if(this.newEvent.event_description.trim() == '') return this.e('Veuillez ajoutez une description')
			if(this.newEvent.start_date.trim() == '') return this.e("Date de l'Event ")
			if(this.newEvent.end_date.trim() == '') return this.e("Fin de l'event")
			
			const res = await this.callApi('post', '/api/calendar', this.newEvent)
			if(res.status === 201 || res.status === 200){
				this.users.unshift(res.data);
				this.s('Event has been added succesfully!')
                this.newEvent.event_name = ''
				this.newEvent.event_image = ''
				this.newEvent.event_description = ''
				this.newEvent.start_date = ''
				this.newEvent.end_date = ''

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
      }
      
  },

  async created(){
    this.token = window.Laravel.csrfToken
    const res = await this.callApi('get', '/api/calendar')
    if(res.status === 200){
        this.calendarOptions.events = res.data.data
    }else{
        this.swr()
    }
  }
}
</script>