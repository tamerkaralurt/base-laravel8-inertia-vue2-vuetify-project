<template>
  <v-app>
    <v-main>
      <v-container fill-height fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="4">
            <v-card class="mx-auto" outlined>
              <v-card-title>Login</v-card-title>
              <v-form @submit.prevent="submit">
                <v-card-text>
                  <v-text-field
                    v-model="form.email"
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
                  <v-checkbox
                    v-model="form.remember"
                    label="Remember Me"
                  ></v-checkbox>
                </v-card-text>
                <v-card-actions>
                  <v-btn
                    type="submit"
                    align="center"
                    justify="center"
                    color="primary"
                    :loading="form.processing"
                    :disabled="form.processing"
                  >
                    <v-icon>mdi-login-variant</v-icon>
                    Login
                  </v-btn>
                  <v-btn
                    text
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    >Forgot your password?</v-btn
                  >
                </v-card-actions>
              </v-form>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  components: {},

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
};
</script>
