<template>
  <v-app>
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-form @submit.prevent="submit">
            <v-card class="mx-auto" outlined>
              <v-card-text>
                <template v-if="!recovery">
                  Please confirm access to your account by entering the
                  authentication code provided by your authenticator
                  application.
                </template>
                <template v-else>
                  Please confirm access to your account by entering one of your
                  emergency recovery codes.
                </template>
              </v-card-text>
              <v-card-text>
                <v-text-field
                  v-if="!recovery"
                  v-model="form.code"
                  label="Code"
                  :error="this.form.errors.code != undefined"
                  :error-messages="this.form.errors.code"
                ></v-text-field>
                <v-text-field
                  v-else
                  v-model="form.recovery_code"
                  label="Recovery Code"
                  :error="this.form.errors.recovery_code != undefined"
                  :error-messages="this.form.errors.recovery_code"
                ></v-text-field>
              </v-card-text>
              <v-card-actions>
                <v-btn @click.prevent="toggleRecovery">
                  <template v-if="!recovery"> Use a recovery code </template>
                  <template v-else> Use an authentication code </template>
                </v-btn>
                <v-btn
                  type="submit"
                  align="center"
                  justify="center"
                  :loading="form.processing"
                  :disabled="form.processing"
                  color="primary"
                  >Login</v-btn
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
      recovery: false,
      form: this.$inertia.form({
        code: "",
        recovery_code: "",
      }),
    };
  },

  methods: {
    toggleRecovery() {
      this.recovery ^= true;

      this.$nextTick(() => {
        if (this.recovery) {
          this.$refs.recovery_code.focus();
          this.form.code = "";
        } else {
          this.$refs.code.focus();
          this.form.recovery_code = "";
        }
      });
    },

    submit() {
      this.form.post(this.route("two-factor.login"));
    },
  },
};
</script>
