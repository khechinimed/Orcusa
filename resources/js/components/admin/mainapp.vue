<template>
  <div>
    <div>
      <!--========== ADMIN SIDE MENU one ========-->
      <div class="_1side_menu show collapse" id="collapseExample">
        <div class="_1side_menu_logo">
          <img class="banner_logo"  style="width: 240px;margin-left: 0px;" :src="'/images/logo.png'">
          <!--<img src="/img/logo.jpg" style="width: 108px;margin-left: 68px;"/>-->
        </div>

        <!--~~~~~~~~ MENU CONTENT ~~~~~~~~-->
        <div class="_1side_menu_content">
          <div class="_1side_menu_img_name">
            <!-- <img class="_1side_menu_img" src="/pic.png" alt="" title=""> -->
            <p class="_1side_menu_name">Tableau de bord</p>
          </div>

          <!--~~~ MENU LIST ~~~~~~-->
          <div class="_1side_menu_list">
            <ul class="_1side_menu_list_ul">
              <li><router-link to="admin"><Icon type="md-analytics"/>Dashboard</router-link></li>
              <li><router-link to="events"><Icon type="ios-megaphone"/>Évènements</router-link></li>
              <li><router-link to="users"><Icon type="ios-people"/>Utilisateurs</router-link></li>
              <li><router-link to="demandes"><Icon type="ios-megaphone"/>Demande d'adhésion</router-link></li>
              <li><a href="/wink" target="_blank"><Icon type="ios-create"/>Blog</a></li>
              


              <!-- <li><router-link to="tags"><Icon type="ios-speedometer" /> Tags</router-link></li>
              <li><router-link to="category"><Icon type="ios-speedometer" /> Category</router-link></li>
              <li><router-link to="adminusers"><Icon type="ios-speedometer" /> Admin users</router-link></li>
              <li><router-link to="role"><Icon type="ios-speedometer" /> Role Management</router-link></li>
              <li><router-link to="assignRole"><Icon type="ios-speedometer" /> Assign role</router-link></li> -->
            </ul>
            <ul class="_1side_menu_list_ul2">
              <li><Button type="primary" @click="logout">Déconnexion</Button></li>
            </ul>
          </div>
        </div>
      </div>
      <!--========== ADMIN SIDE MENU ========-->

      <!--========= HEADER ==========-->
      <div class="header">
        <div class="_2menu _box_shadow">
          <div class="_2menu_logo">
            <ul class="open_button">
              <li>
                <a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><Icon type="ios-list" /></a>
              </li>
              <!--<li><Icon type="ios-albums" /></li>-->
            </ul>
          </div>
        </div>
      </div>
      <!--========= HEADER ==========-->
    </div>
    <router-view/>
  </div>
</template>

<script>

    export default {
        methods: {
            logout() {
                axios.post('/logout')
                    .then(() => location.href = '/login')
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>