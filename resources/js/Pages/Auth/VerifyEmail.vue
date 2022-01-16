<template>
  <v-app>
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-form @submit.prevent="submit">
            <v-card class="mx-auto" outlined>
              <v-card-text
                >Thanks for signing up! Before getting started, could you verify
                your email address by clicking on the link we just emailed to
                you? If you didn't receive the email, we will gladly send you
                another.</v-card-text
              >
              <v-card-text v-if="verificationLinkSent">
                A new verification link has been sent to the email address you
                provided during registration.
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
                  >Resend Verification Email</v-btn
                >
                <v-btn :href="route('logout')" depressed>Logout</v-btn>
                <inertia-link
                  :href="route('logout')"
                  method="post"
                  as="v-btn"
                  depressed
                  >Logout</inertia-link
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
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form(),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("verification.send"));
    },
  },

  computed: {
    verificationLinkSent() {
      return this.status === "verification-link-sent";
    },
  },
};
</script>
