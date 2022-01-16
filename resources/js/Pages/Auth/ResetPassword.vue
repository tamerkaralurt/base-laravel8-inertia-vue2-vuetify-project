<template>
  <v-app>
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-form @submit.prevent="submit">
            <v-card class="mx-auto" outlined>
              <v-card-text>
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
              </v-card-text>
              <v-card-text>
                <v-text-field
                  v-model="form.email"
                  type="email"
                  label="E-Mail"
                  :error="this.form.errors.email != undefined"
                  :error-messages="this.form.errors.email"
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  type="password"
                  label="Password"
                  :error="this.form.errors.password != undefined"
                  :error-messages="this.form.errors.password"
                ></v-text-field>
                <v-text-field
                  v-model="form.password_confirmation"
                  type="password"
                  label="Confirm Password"
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
                  >Reset Password</v-btn
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

  props: {
    email: String,
    token: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.update"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
