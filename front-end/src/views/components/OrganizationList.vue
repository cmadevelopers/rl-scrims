<template>
  <section class="section pb-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row row-grid">
            <div
              v-for="organization in organizations"
              :key="organization.id"
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
                  {{ organization.name }}
                </h6>
                <p class="description mt-3">{{ organization.description }}</p>
                <p class="description mt-2">Created: {{ organization.created_at }}</p>
                <p class="description mt-2">Updated: {{ organization.updated_at }}</p>
                <div>
                  <badge type="primary" rounded>design</badge>
                  <badge type="primary" rounded>system</badge>
                  <badge type="primary" rounded>creative</badge>
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
    organizations: [],
  }),
  mounted() {
    this.getOrganization();
  },
  methods: {
    getOrganization() {
      Request.list(Endpoints.endpoints.organizations)
        .then((response) => {
          this.organizations = response.data.data;
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