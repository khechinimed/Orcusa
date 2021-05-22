<template>
    <div class="events-page">
        <div class="container">
            <div class="calendrier">
                <h2>Calendrier des évènements</h2>
                <div class="calendrier p6">
                    <FullCalendar
                        :options="calendarOptions"
                    />
                    <template>
                        <Modal
                            v-model="modal1"
                            title="Détails de l'événement"
                            @on-ok="ok"
                            @on-cancel="cancel">
                            <img :src="`${newEvent.event_image}`" class="card-img-top">
                            <div class="card-body">
                                <h5 class="event-title card-title">{{newEvent.event_name}}</h5>
                                <p class="event-description card-text">{{newEvent.event_description}}</p>
                                <p class="event-date card-text">Date et heure : <Tag size="large" color="blue">{{newEvent.start_date | formatDate}}</Tag></p>
                                <p class="event-date card-text" style="margin-left: 118px;">Fin : <Tag size="large" color="red">{{newEvent.end_date | formatDate}}</Tag></p>
                            </div>
                            <div slot="footer">
                                <Button type="default" @click="modal1=false">Fermer</Button>
                            </div>
                        </Modal>
                    </template>
                </div> 
            </div>
            <div class="last-events">
                <h2 style="padding: 50px;">Evénements à venir</h2>
                <div class="row mb-4">
                    <div class="col-6 col-md-3 col-sm-6 card" style="margin-top:15px; margin-left: 80px;padding: 0px;" v-for="event in computedObj" :key="event.id">
                        <div class="col d-flex flex-column position-static p-0" >
                            <img :src="`${event.image}`" class="card-img-top">
                            <div class="card-body">
                                <h5 class="event-title-2 card-title">{{event.title}}</h5>
                                <p class="event-date card-text">Date et heure : <Tag color="blue">{{event.start | formatDate}}</Tag></p>
                                <p class="event-date card-text">Fin : <Tag color="red">{{event.end | formatDate}}</Tag></p>
                            </div>
                        </div>
                    </div>
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
                    timeFormat: 'H(:mm)',
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
                comingevents: 3,
                indexToUpdate: "",
                modal1: false
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

            showEvent(arg) {
                const { id, title, description, image, start, end} =  this.calendarOptions.events.find(
                    event => event.id === +arg.event.id
                );
        
                this.indexToUpdate = id;
                this.newEvent = {
                    event_name: title,
                    event_image: image,
                    event_description: description,
                    start_date: start,
                    end_date: end
                };
                this.modal1 = true
            },
            ok () {
                
            },
            cancel () {
                
            }
        },
        computed: {
            computedObj(){
                return this.comingevents ? this.calendarOptions.events.reverse().slice(0,this.comingevents) : this.calendarOptions.events
            }
        },
        async created(){
            this.token = window.Laravel.csrfToken
            this.getEvents()
        }
    }
</script>