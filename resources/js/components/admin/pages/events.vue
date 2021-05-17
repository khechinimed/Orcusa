<template>
    <div>
        <div class="content">
			<div class="container-fluid">
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
        }
    }
  },
  methods: {
      getEvents(){
          
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