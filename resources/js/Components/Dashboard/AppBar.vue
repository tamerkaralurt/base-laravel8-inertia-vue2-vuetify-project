<template>
  <v-app-bar app>
    <v-app-bar-nav-icon @click.prevent="drawer()"></v-app-bar-nav-icon>
    <v-toolbar-title>Application</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-menu transition="slide-y-transition" offset-y bottom>
      <template v-slot:activator="{ on: menu, attrs }">
        <v-tooltip left>
          <template v-slot:activator="{ on: tooltip }">
            <v-avatar v-bind="attrs" v-on="{ ...tooltip, ...menu }">
              <v-img
                :lazy-src="user.avatar"
                :src="user.avatar"
                :alt="user.name"
                contain
              ></v-img>
              <!-- <v-icon>mdi-account</v-icon> -->
            </v-avatar>
          </template>
          <span>{{ user.name }}</span>
        </v-tooltip>
      </template>
      <v-list dense>
        <v-list-item-group>
          <inertia-link
            as="v-list-item"
            class="d-flex justify-center align-center"
            :href="route(`users.show`, user.uuid)"
            :class="{
              'v-item--active v-list-item--active':
                $page.component === 'Dashboard/Users/Show',
            }"
            preserve-scroll
          >
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Profile</v-list-item-title>
            </v-list-item-content>
          </inertia-link>
        </v-list-item-group>
      </v-list>
    </v-menu>
  </v-app-bar>
</template>

<script>
export default {
  methods: {
    drawer() {
      this.$store.commit("drawer");
    },
  },
  computed: {
    user() {
      return {
        uuid: this.$page.props.user.uuid,
        name: this.$page.props.user.name,
        avatar: this.$page.props.user.profile_photo_url,
      };
    },
  },
};
</script>

<style>
</style>