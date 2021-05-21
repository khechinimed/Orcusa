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
                                <h5 class="card-title">{{newEvent.event_name}}</h5>
                                <p class="card-text">{{newEvent.event_description}}</p>
                                <p class="card-text">Date et heure : {{newEvent.start_date}}</p>
                                <p class="card-text">Fin : {{newEvent.end_date}}</p>
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
                    <div class="col-md-3 card" style="margin-left: 80px;padding: 0px;" v-for="event in computedObj" :key="event.id">
                        <img :src="`${event.image}`" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{event.title}}</h5>
                            <p class="card-text">{{event.description}}</p>
                            <p class="card-text">{{event.start}}</p>
                            <p class="card-text">{{event.end}}</p>
                            <Button @click="showEvent" type="info">Montre</Button>
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