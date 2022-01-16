<template>
  <v-app>
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-form @submit.prevent="submit">
            <v-card class="mx-auto" outlined>
              <v-card-text>
                <v-text-field
                  v-model="form.password"
                  type="password"
                  label="Password"
                  :error="this.form.errors.password != undefined"
                  :error-messages="this.form.errors.password"
                ></v-text-field>
              </v-card-text>
              <v-card-actions>
                <v-btn
                  type="submit"
                  align="center"
                  justify="center"
                  :loading="form.processing"
                  :disabled="form.processing"
                  color="primary"
                  >Confirm</v-btn
                >
              </v-card-actions>
            </v-card>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  components: {},

  data() {
    return {
      form: this.$inertia.form({
        password: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.confirm"), {
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>
