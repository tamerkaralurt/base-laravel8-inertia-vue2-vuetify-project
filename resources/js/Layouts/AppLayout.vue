<template>
  <v-app id="inspire">
    <NavigationDrawer />
    <AppBar />
    <v-main>
      <slot></slot>
      <v-footer class="grey lighten-1" padless absolute>
        <v-col class="text-center" cols="12"
          >{{ new Date().getFullYear() }} — <strong>Vuetify</strong></v-col
        >
      </v-footer>
    </v-main>
  </v-app>
</template>

<script>
import NavigationDrawer from '../Components/Dashboard/NavigationDrawer';
import AppBar from '../Components/Dashboard/AppBar';
export default {
  components: {NavigationDrawer,AppBar},

  data() {
    return {
      showingNavigationDropdown: false,
      drawer: null,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
