<template>
  <v-navigation-drawer v-model="$store.state.drawer" app>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="text-h6">{{ appName }}</v-list-item-title>
        <v-list-item-subtitle> subtext </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list dense nav>
      <v-list-item-group>
        <inertia-link
          as="v-list-item"
          v-for="item in items"
          :key="item.title"
          :href="item.route"
          :class="{
            'v-item--active v-list-item--active': $page.component === item.component,
          }"
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </inertia-link>
      </v-list-item-group>
    </v-list>
    <template v-slot:append>
      <div class="pa-2">
        <inertia-link as="v-btn" block method="post" :href="route('logout')"
          >Logout</inertia-link
        >
      </div>
    </template>
  </v-navigation-drawer>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          title: "Dashboard",
          icon: "mdi-view-dashboard",
          route: route("dashboard"),
          component: "Dashboard/Index",
        },
        {
          title: "About",
          icon: "mdi-help-box",
          route: route("about"),
          component: "Dashboard/About",
        },
      ],
      right: null,
    };
  },
  computed: {
    appName() {
      return this.$page.props.appName;
    },
    model() {
      return 0;
    },
  },
};
</script>

<style>
</style>