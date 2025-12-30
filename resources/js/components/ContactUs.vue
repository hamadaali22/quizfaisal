<template>
  <div class="container" Style="direction: rtl;text-align: right;">
    <section class="mb-4">

      <h2 class="h1-responsive font-weight-bold text-center my-4">
        {{ $t('contactUs') }} 
      </h2>

      <p class="text-center w-responsive mx-auto mb-5">
        {{ $t('DoYouHaveSuggestion') }}
      </p>

      <div class="row">
        <!-- Form -->
        <div class="col-md-9 mb-md-0 mb-5">

          <!-- 👇 Vue submit -->
          <form @submit.prevent="sendMessage">

            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" class="form-control" v-model="form.name" />
                  <label>{{ $t('name') }} </label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="email" class="form-control" v-model="form.email" />
                  <label>{{ $t('Email') }}</label>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" class="form-control" v-model="form.subject" />
                  <label>{{ $t('subject') }}</label>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea rows="3" class="form-control md-textarea" v-model="form.message"></textarea>
                  <label>{{ $t('yourMessage') }}</label>
                </div>
              </div>
            </div>

            <div class="text-center text-md-left mt-3">
              <button class="btn btn-primary" type="submit" :disabled="loading">
               
                {{ loading ? 'Sending...' : $t('send') }}
              </button>
            </div>

          </form>

          <!-- Messages -->
          <p v-if="success" class="text-success mt-3">{{ success }}</p>
          <p v-if="error" class="text-danger mt-3">{{ error }}</p>

        </div>

        <!-- Info -->
        <div class="col-md-3 text-center">
          <ul class="list-unstyled mb-0">
            <li>
              <i class="fas fa-map-marker-alt fa-2x"></i>
              <p>Kurhausstr. 10 52062 Aachen</p>
            </li>

            <li>
              <i class="fas fa-phone mt-4 fa-2x"></i>
              <p>+4917667716469</p>
            </li>

            <li>
              <i class="fas fa-envelope mt-4 fa-2x"></i>
              <p>info@deutschtests.com</p>
            </li>
          </ul>
        </div>
      </div>

    </section>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "ContactUs",

  data() {
    return {
      loading: false,
      success: "",
      error: "",
      form: {
        name: "",
        email: "",
        subject: "",
        message: "",
      },
    };
  },

  methods: {
    async sendMessage() {
      this.loading = true;
      this.success = "";
      this.error = "";

      try {
        const res = await axios.post(
          "https://deutschtests.com/api/contact-us",
          this.form
        );

        if (res.data.status) {
          this.success = res.data.message;

          // reset form
          this.form = {
            name: "",
            email: "",
            subject: "",
            message: "",
          };
        }
      } catch (err) {
        this.error =
          err.response?.data?.message || "Something went wrong";
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
