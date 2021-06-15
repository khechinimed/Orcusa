<template>
    <div>
        <div class="content dashboard">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
                    <h1>Dashboard</h1>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Membres</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{this.users}}</div>
                                        </div>
                                        <div class="col-auto icon">
                                            <Icon type="ios-people" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Demandes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{this.dm}}</div>
                                        </div>
                                        <div class="col-auto icon">
                                            <Icon type="md-paper-plane" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Évènements</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{this.ev}}</div>
                                        </div>
                                        <div class="col-auto icon">
                                            <Icon type="md-calendar" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Postes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{this.posts}}</div>
                                        </div>
                                        <div class="col-auto icon">
                                            <Icon type="md-paper" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   



                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <FullCalendar
                                    :options="calendarOptions"
                                />
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">FAQ</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;margin: auto;" :src="'/images/team.svg'" alt="...">
                                    </div>
                                    <form action="">
                                        <section v-for="faq in faqs" :key="faq.id">
                                            <Input v-model="faq.title" placeholder="Enter something..." style="width: 300px;margin: 5px;"/>Q
                                            <Input v-model="faq.text" placeholder="Enter something..." style="width: 300px;margin: 5px;" />A<br>
                                        </section>
                                        
                                        <Button type="success" style="margin: 0 100px;" @click="editFAQ">Modifier</Button>
                                    </form>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Textes</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
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
        return{
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin, ListPlugin, TimeGridPlugin],
                initialView: 'dayGridMonth',
                selectable: true,
                eventTimeFormat: true,
                locale: "fr",
                buttonText: {
                    today: 'Aujourd\'hui'
                },
                events: [],
            },

            users: "",
            dm: "",
            ev: "",
            posts: "",
            faqs: {}
        }
    },
    methods: {
        async countUsers(){
            const res = await this.callApi('get', 'app/countUsers')
            this.users = res.data
        },

        async countDm(){
            const res = await this.callApi('get', 'app/countDemandes')
            this.dm = res.data
        },

        async countEvents(){
            const res = await this.callApi('get', 'app/countEvents')
            this.ev = res.data
        },

        async countPosts(){
            const res = await this.callApi('get', 'app/countPosts')
            this.posts = res.data
        },
        async getEvents(){
                
                const res = await this.callApi('get', '/api/calendar')

                if(res.status === 200){
                    this.calendarOptions.events = res.data.data
                }else{
                    this.swr()
                }
        },
        async editFAQ(){
            const res = await this.callApi('post', 'faq/edit_faq', this.faqs)
            if(res.status === 200){
                this.s('FAQ has been updated succesfully!')
            }
        }
    },
    async created(){
        this.countUsers()
        this.countDm()
        this.countEvents()
        this.countPosts()

        this.getEvents()

        const faq = await this.callApi('get', 'faq/get_faq')
        if(faq.status === 200){
		 	this.faqs = faq.data
		}else{
		 	this.swr()
		}
    }
}
</script>

<style scoped>

</style>