<template>
  <v-app>
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-form @submit.prevent="submit">
            <v-card class="mx-auto" outlined>
              <v-card-title>Register</v-card-title>
              <v-card-text>
                <v-text-field
                  label="Name"
                  v-model="form.name"
                  :error="this.form.errors.name != undefined"
                  :error-messages="this.form.errors.name"
                ></v-text-field>
                <v-text-field
                  label="E-Mail"
                  v-model="form.email"
                  :error="this.form.errors.email != undefined"
                  :error-messages="this.form.errors.email"
                ></v-text-field>
                <v-text-field
                  label="Password"
                  type="password"
                  v-model="form.password"
                  :error="this.form.errors.password != undefined"
                  :error-messages="this.form.errors.password"
                ></v-text-field>
                <v-text-field
                  label="Confirm Password"
                  type="password"
                  v-model="form.password_confirmation"
                  :error="this.form.errors.password_confirmation != undefined"
                  :error-messages="this.form.errors.password_confirmation"
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
                >
                  <v-icon>mdi-account-plus</v-icon>
                  Register
                </v-btn>
                <v-btn :href="route('login')" depressed
                  >Already registered?</v-btn
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
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
