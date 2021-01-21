<template>
  <section class="section-shaped section-lg my-0">
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
          <card shadow body-classes="px-lg-5 py-lg-5" class="border-0">
            <template>
              <div class="text-muted text-center">
                <Alert ref="Alert"></Alert>
              </div>
              <div class="text-muted text-center mb-3">
                <small>Logar com</small>
              </div>
              <div class="btn-wrapper text-center">
                <form
                  action="https://steamcommunity.com/openid/login"
                  method="post"
                >
                  <input
                    type="hidden"
                    name="openid.identity"
                    value="http://specs.openid.net/auth/2.0/identifier_select"
                  />
                  <input
                    type="hidden"
                    name="openid.claimed_id"
                    value="http://specs.openid.net/auth/2.0/identifier_select"
                  />
                  <input
                    type="hidden"
                    name="openid.ns"
                    value="http://specs.openid.net/auth/2.0"
                  />
                  <input
                    type="hidden"
                    name="openid.mode"
                    value="checkid_setup"
                  />
                  <input
                    type="hidden"
                    name="openid.realm"
                    value="https:\\localhost/niconimes"
                  />
                  <input
                    type="hidden"
                    name="openid.return_to"
                    value="https:\\localhost/niconimes"
                  />
                  <base-button
                    is="button"
                    type="submit"
                    value="loginSteam"
                    class="steambutton"
                    ><span>Entrar com Steam</span>
                    <div class="icon">
                      <i class="fa fa-steam-square"></i></div
                  ></base-button>
                </form>
                <!-- <base-button type="neutral">
                  <img slot="icon" src="img/icons/common/github.svg" />
                  Github
                </base-button>

                <base-button type="neutral">
                  <img slot="icon" src="img/icons/common/google.svg" />
                  Google
                </base-button> -->
              </div>
            </template>
            <template>
              <div class="text-center text-muted mb-3 mt-3">
                <small>Ou faça login com credenciais</small>
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
                  placeholder="Senha"
                  addon-left-icon="ni ni-lock-circle-open"
                  v-model="userData.password"
                >
                </base-input>
                <base-checkbox class="text-muted"> Lebrar dados?</base-checkbox>
                <div class="text-center">
                  <base-button type="primary" class="my-4" @click="login()"
                    >Entrar</base-button
                  >
                </div>
              </form>
            </template>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light">
                  <small>Esqueceu a senha?</small>
                </a>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="text-light">
                  <small>Criar nova conta</small>
                </a>
              </div>
            </div>
          </card>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Endpoints from "../services/endpoints";
import Request from "../services/request-entity";
import Alert from "../components/Alert";
import BaseButton from "../components/BaseButton.vue";

export default {
  components: {
    Alert,
    BaseButton,
  },
  data: () => ({
    showPassword: false,
    userData: {
      email: "",
      password: "",
    },
    rules: {},
  }),
  methods: {
    showMsg: function (text, color, timeout = 3) {
      this.$refs.Alert.showMsg(text, color, timeout);
    },
    login() {
      Request.login(Endpoints.endpoints.login, this.userData)
        .then((response) => {
          if (response.status === 400) {
            this.showMsg("Falha ao logar, dados incorretos!", "error", 3);
          } else {
            if ("access_token" in response.data) {
              // iniciando a sessão
              this.$session.start();
              this.$session.set("jwt", response.data.access_token);
              // console.log(response.data.accessToken);

              // armazenando o token no armazenamento local
              sessionStorage.setItem(
                process.env.VUE_APP_AUTH_TOKEN_KEY,
                response.data.access_token
              );

              //redirecionamento pro meu principal
              this.$router.push("/");
              //this.$router.push('/home')
              location.reload();
            }
          }
        })
        .catch((err) => {
          this.showMsg("Erro ao Logar! Dados incorretos", "error", 3);
        });
    },
  },
};
</script>
<style scoped>
button {
  background: none;
  color: inherit;
  border: none;
  padding: 0;
  font: inherit;
  cursor: pointer;
  outline: inherit;
}
.steambutton {
  display: flex;
  background-color: #6f9f31;
  width: 100%;
  height: 40px;
  line-height: 40px;
  margin: auto;
  color: #fff;
  position: relative;
  cursor: pointer;
  overflow: hidden;
  border-radius: 5px;
}

.steambutton span {
  font-family: "Exo 2", sans-serif;
  font-weight: bold;
  letter-spacing: 0.1em;
  width: 75%;
  font-size: 14px;
  text-transform: uppercase;
  left: 0;
  -webkit-transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4);
  transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4);
}

.steambutton span,
.steambutton .icon {
  display: block;
  height: 100%;
  text-align: center;
  position: absolute;
  top: 0;
}

.steambutton .icon .fa {
  font-size: 30px;
  line-height: 40px;
  -webkit-transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4),
    height 0.25s ease;
  transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4), height 0.25s ease;
}

.steambutton .icon {
  width: 25%;
  right: 0;
  -webkit-transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4);
  transition: all 0.25s cubic-bezier(0.31, -0.105, 0.43, 1.4);
}

.steambutton span,
.steambutton .icon {
  display: block;
  height: 100%;
  text-align: center;
  position: absolute;
  top: 0;
}

.fa {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  transform: translate(0, 0);
}

.steambutton span:after {
  content: "";
  background-color: #5d8628;
  width: 2px;
  height: 70%;
  position: absolute;
  top: 15%;
  right: -1px;
}

.steambutton.success span,
.steambutton:hover span {
  left: -72%;
  opacity: 0;
}

.steambutton.success .icon,
.steambutton:hover .icon {
  width: 100%;
}

.steambutton.success .icon .fa,
.steambutton:hover .icon .fa {
  font-size: 35px;
}
</style>
