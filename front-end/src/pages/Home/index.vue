<template>
  <div class="page">
    <img :src="logoPath" alt="Logo" />

    <div class="formHome">
      <div class="col-md-12 col-md-12 d-flex">
        <div class="col-md-6 col-12">
          <h2>Lista de produtos</h2>
          <p>Escolha uma das opções abaixo</p>
        </div>
        <div class="col-md-6 col-12">
          <h2>Checkout</h2>
          <p>Resumo da compra</p>
        </div>
      </div>

      <br />
      <div class="col-md-12 d-flex">
        <div class="col-md-6">
          <div
            class="d-flex"
            v-for="produto in produtos.data"
            :key="produto.id"
          >
            <div
              @click="incrementaProduto(produto.id, produto.nome)"
              class="button_plus"
            ></div>

            <p>{{ produto.nome }}</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-flex" v-for="prod in proSelecionados" :key="prod.id">
            <p class="m-2">{{ prod.quantidade }}x {{ prod.nome }}</p>
            <button @click="decrementaProduto(prod.id)" class="button_trash">
              <img :src="lixeira" alt="" />
            </button>
          </div>
        </div>
      </div>
      <div class="col-12 d-flex">
        <div class="col-9"></div>
        <div class="col-3">
          <button
            @click="submit()"
            type="submit"
            value="Fechar pedido"
            class="btn-login btn-home w-100"
          >
            <img :src="carrinho" alt="" style="margin-right: 1rem" />FECHAR
            PEDIDO
          </button>
        </div>
      </div>
    </div>
    <p class="copy mt-2">Copyright 2023 - Master da Web</p>
  </div>
</template>
<script>
import logo from "/src/assets/logo-removebg-preview.png";
import lixeira from "/src/assets/trash-2-16.png";
import carrinho from "/src/assets/cart-59-16.png";
import router from "@/router";
import { useToast } from "vue-toastification";

export default {
  name: "HomeView",
  data() {
    return {
      logoPath: logo,
      lixeira: lixeira,
      carrinho: carrinho,
      password: "",
      email: "",
      produtos: {},
      proSelecionados: [],
      error: "",
    };
  },

  mounted() {
    this.$http
      .get("produtos")
      .then((res) => {
        this.produtos = res.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },

  created() {
    if (localStorage.getItem("token") == null) {
      router.push("/login");
    }
  },

  methods: {
    submit() {
      var data = { itens: this.proSelecionados };
      this.$http
        .post("pedido", data)
        .then(() => {
          const toast = useToast();
          toast.success("Pedido enviado com sucesso!");
          this.proSelecionados = [];
        })
        .catch((error) => {
          const toast = useToast();
          toast.error("Erro ao enviar pedido! Tente novamente!");
          console.error(error);
        });
    },

    incrementaProduto(id, nome) {
      const produtoExistente = this.proSelecionados.find(
        (item) => item.id === id
      );

      if (produtoExistente) {
        produtoExistente.quantidade++;
      } else {
        this.proSelecionados.push({ id, nome, quantidade: 1 });
      }
    },

    decrementaProduto(id) {
      const produtoExistente = this.proSelecionados.find(
        (item) => item.id === id
      );

      if (produtoExistente) {
        if (produtoExistente.quantidade > 1) {
          produtoExistente.quantidade--;
        } else {
          const index = this.proSelecionados.indexOf(produtoExistente);
          this.proSelecionados.splice(index, 1);
        }
      }
    },
  },
};
</script>
<style></style>
