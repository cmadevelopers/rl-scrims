<template>
  <section class="section pb-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row row-grid">
            <div
              v-for="user in users"
              :key="user.id"
              class="col-md-6 col-lg-3 mb-5 mb-lg-0"
              style="padding-bottom: 25px"
            >
              <card class="border-0" hover shadow body-classes="py-4">
                <icon
                  name="ni ni-check-bold"
                  type="primary"
                  rounded
                  class="mb-3"
                >
                </icon>
                <h6 class="text-primary text-uppercase">
                  {{ user.name }}
                </h6>
                <div class="text-secondary">
                  <p class="description mt-3">{{ user.username }}</p>
                  <p class="description mt-2">
                    Created: {{ user.created_at }}
                  </p>
                  <p class="description mt-2">
                    Updated: {{ user.updated_at }}
                  </p>
                </div>

                <div>
                  <badge type="secondary" rounded>design</badge>
                  <badge type="secondary" rounded>system</badge>
                  <badge type="secondary" rounded>creative</badge>
                </div>
              </card>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Endpoints from "../../services/endpoints";
import Request from "../../services/request-entity";

export default {
  data: () => ({
    users: [],
  }),
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      Request.list(Endpoints.endpoints.users)
        .then((response) => {
          this.users = response.data.data;
          console.log(response);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style>
</style>