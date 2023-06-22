<template>
  <div class="page">
    <div class="formLogin">
      <h1>Login</h1>
      <p>Digite os seus dados de acesso no campo abaixo.</p>
      <p class="erro" v-if="error">{{ error }}</p>
      <label for="email">E-mail</label>
      <input
        v-model="email"
        type="email"
        placeholder="Digite seu e-mail"
        autofocus="true"
      />
      <label for="password">Senha</label>
      <input
        v-model="password"
        type="password"
        placeholder="Digite seu e-mail"
      />
      <a href="/usuario">Criar uma conta -></a>
      <input
        @click="submit()"
        type="submit"
        value="Acessar"
        class="btn-login"
      />
    </div>
  </div>
</template>
<script>
import router from "@/router";
import { useToast } from "vue-toastification";


export default {
  name: "LoginView",
  data() {
    return {
      password: "",
      email: "",
      error: "",
    };
  },
  methods: {
    validate() {
      if (!this.password || !this.email) {
        this.error = "Por favor, preencha todos os campos.";
        return false;
      }
      return true;
    },
    submit() {
      if (this.validate()) {
        var data = { email: this.email, password: this.password };
        this.$http
          .post("login", data)
          .then((response) => {
            const token = response.data.plainTextToken;
            localStorage.setItem("token", token);
            router.push("/");
          })
          .catch((error) => {
            const toast = useToast();
            toast.error('Erro ao fazer o login! Tente novamente!');
            console.log(error);
          });
      }
    },
  },
};
</script>
