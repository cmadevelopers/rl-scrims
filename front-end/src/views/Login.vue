<template>
  <section class="section section-shaped section-lg my-0">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <card
            type="secondary"
            shadow
            header-classes="bg-white pb-5"
            body-classes="px-lg-5 py-lg-5"
            class="border-0"
          >
            <template>
              <div class="text-muted text-center mb-3">
                <small>Logar com</small>
              </div>
              <div class="btn-wrapper text-center">
                <base-button type="neutral">
                  <img slot="icon" src="img/icons/common/github.svg" />
                  Github
                </base-button>

                <base-button type="neutral">
                  <img slot="icon" src="img/icons/common/google.svg" />
                  Google
                </base-button>
              </div>
            </template>
            <template>
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form">
                <base-input
                  alternative
                  class="mb-3"
                  placeholder="Email"
                  addon-left-icon="ni ni-email-83"
                  type="email"
                  v-model="userData.email"
                >
                </base-input>
                <base-input
                  alternative
                  type="password"
                  placeholder="Password"
                  addon-left-icon="ni ni-lock-circle-open"
                  v-model="userData.password"
                >
                </base-input>
                <base-checkbox> Remember me </base-checkbox>
                <div class="text-center">
                  <base-button type="primary" class="my-4" @click="login()"
                    >Sign In</base-button
                  >
                </div>
              </form>
            </template>
          </card>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light">
                <small>Forgot password?</small>
              </a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light">
                <small>Create new account</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Endpoints from "../services/endpoints";
import Request from "../services/request-entity";

export default {
  data: () => ({
    showPassword: false,
    userData: {
      email: "",
      password: "",
    },
    rules: {},
  }),
  methods: {
    login() {
      Request.login(Endpoints.endpoints.login, this.userData)
        .then((response) => {
          if (response.status === 400) {
            // this.showMsg("Falha ao logar, dados incorretos!", "error", 3000);
            alert("Falha ao logar, dados incorretos!");
          } else {
            if ("access_token" in response.data) {
              // iniciando a sessão
              this.$session.start();
              this.$session.set("jwt", response.data.access_token);
              // console.log(response.data.accessToken);

              // armazenando o token no armazenamento local
              sessionStorage.setItem("userToken", response.data.access_token);

              //redirecionamento pro meu principal
              this.$router.push("/");
              //this.$router.push('/home')
              location.reload();
            }
          }
        })
        .catch((err) => {
          //   this.showMsg("Erro ao Logar! Dados incorretos", "error", 3000);
          console.log(err);
          alert("Falha ao logar, dados incorretos!");
        });
    },
  },
};
</script>
<style>
</style>
