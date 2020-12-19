import axios from 'axios';
<template>
  <div>
    <!-- START HEADER DE LA PREGUNTA -->
    <div class="card-header">
      <div class="row">
        <div class="col-9">
          <input
            required
            placeholder="pregunta"
            type="text"
            class="form-control"
            v-model="question.title"
          />
        </div>
        <div class="col-auto">
          <select class="custom-select" v-model="question.type_selected">
            <option v-for="type in this.types" :key="type.id" :value="type.id">
              {{ type.name }}
            </option>
          </select>
        </div>
      </div>
    </div>
    <!-- END HEADER DE LA PREGUNTA -->

    <!-- START RESPUESTAS DE LA PREGUNTA -->
    <div class="card-content m-2">
      <div class="row">
        <div class="col">
          <div
            v-for="answer in question.answers"
            :key="answer.order"
            class="input-group mb-3"
          >
            <input
              type="text"
              required
              placeholder="Respuesta"
              class="form-control"
              v-model="answer.name"
              aria-describedby="button-delete"
            />
            <div class="input-group-append">
              <button
                v-if="answer.order == counter && answer.order != 1"
                class="btn btn-outline-danger"
                type="button"
                v-on:click="deleteAnswer(answer)"
              >
                <i class="bi bi-trash-fill"></i>
              </button>
            </div>
          </div>
          <a
            v-if="counter <= 6"
            class="btn btn-outline-dark form-control"
            v-on:click="addAnswer"
            >Nueva respuesta</a
          >
          <a v-else disabled class="btn btn-disabled form-control"
            >Limite de respuestas</a
          >
          <hr />
        </div>
      </div>
    </div>
    <!-- END RESPUESTAS DE LA PREGUNTA -->
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "question-component",
  data() {
    return {
      counter: 3,
      types: [],
    };
  },
  props: ["question"],
  created() {
    axios.get("/api/types").then((result) => (this.types = result.data));
  },
  methods: {
    addAnswer() {
      this.question.answers.push({ order: ++this.counter, name: "" });
    },
    deleteAnswer(answer) {
      this.question.answers.pop(answer);
      this.counter--;
    },
  },
};
</script>

<style>
</style>
