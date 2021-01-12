<template>
  <fade-transition>
    <b-alert
      :show="dismissCountDown"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged"
      :class="[`alert-${color}`]"
    >
      <slot>
        <b-icon
          class="alert-inner--icon"
          :icon="icon"
          font-scale="1.6"
        ></b-icon>
        <span v-if="text" class="alert-inner--text">
          <slot name="text">{{ text }}</slot>
        </span>
      </slot>
    </b-alert>
  </fade-transition>
</template>

<script>
import { FadeTransition } from "vue2-transitions";
export default {
  name: "base-alert",
  components: {
    FadeTransition,
  },
  data: () => ({
    top: true,
    visible: false,
    timeout: 3,
    text: "",
    color: "",
    icon: "",
    dismissCountDown: 0,
  }),

  methods: {
    dismissAlert() {
      this.visible = false;
    },
    showMsg: function (text, color, timeout) {
      this.visible = true;
      this.text = text;
      this.color = color;
      this.timeout = timeout;
      switch (this.color) {
        case "warning":
          this.icon = "exclamation-circle-fill";
          break;
        case "danger":
          this.icon = "x-circle-fill";
          break;
        case "success":
          this.icon = "check-circle-fill";
          break;
        case "info":
          this.icon = "info-circle-fill";
          break;
        default:
          this.icon = "exclamation-circle-fill";
      }
      this.dismissCountDown = this.timeout;
    },
    
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
  },
};
</script>
<style>
</style>
