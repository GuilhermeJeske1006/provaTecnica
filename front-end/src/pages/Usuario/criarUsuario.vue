<template>
  <div class="page-usuario">
    <div class="col-md-12 d-flex">
      <div class="col-md-7"></div>
      <div class="col-md-5">
        <div class="formUsu">
          <h1>Cadastro de usuario</h1>
          <p>Digite os seus dados de acesso no campo abaixo.</p>
          <p v-if="error">{{ error }}</p>
          <label for="name">Nome completo</label>
          <input
            v-model="name"
            type="text"
            placeholder="Digite seu nome"
            autofocus="true"
          />
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
          <br />
          <input
            @click="submit()"
            type="submit"
            value="Criar"
            class="btn-login"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import router from "@/router";
import { useToast } from "vue-toastification";

export default {
  name: "UserView",
  data() {
    return {
      password: "",
      email: "",
      name: "",
      error: "",
    };
  },
  methods: {
    validate() {
      if (!this.password || !this.email || !this.name) {
        this.error = "Por favor, preencha todos os campos.";
        return false;
      }
      return true;
    },
    submit() {
      if (this.validate()) {
        let data = {
          name: this.name,
          password: this.password,
          email: this.email,
        };

        this.$http
          .post("usuario", data)
          .then(() => {
            const toast = useToast();
            toast.success('Usuario cadastrado com sucesso!');
            router.push("/login");
          })
          .catch((error) => {
            const toast = useToast();
            toast.error('Erro ao cadastrar Usuario! Tente novamente!');
            console.log(error);
          });
      }
    },
  },
};
</script>
