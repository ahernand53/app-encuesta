<template>
  <div>
    <a
      class="btn btn-dark btn-sm ml-5"
      href="/dashboard/formulario/stages"
      ><i class="bi bi-arrow-left-short"></i></a
    >
    <div class="container-fluid text-center">
      <h2>Crear Etapa</h2>
    </div>

    <div class="card mt-3">
      <form @submit.prevent="createStage">
        <!-- START HEADER DE LA ETAPA -->
        <div class="card-header">
          <div class="row">
            <div class="col">
              <input
                required
                type="text"
                class="form-control"
                placeholder="titulo de la etapa"
                v-model="title"
              />
            </div>
            <div class="col">
              <input
                type="text"
                required
                class="form-control"
                placeholder="description de la etapa"
                v-model="description"
              />
            </div>
          </div>
        </div>
        <!-- END HEADER DE LA ETAPA -->

        <!-- START PREGUNTAS DE LA ETAPA -->
        <div class="card-content">
          <div class="card-columns card-columns-create">
            <!-- START PREGUNTA -->
            <div class="card p-2" style="background: #ccc">
              <question-component
                v-for="question in questions"
                :key="question.order"
                :question="question"
              ></question-component>
              <!-- START FOOTER DE LA PREGUNTA -->
              <div class="card-footer text-center">
                <button class="btn btn-primary m-0" @click="addQuestion">
                  <i class="bi bi-plus"></i>
                </button>
                <button
                  v-if="counter > 1"
                  class="btn btn-danger m-0"
                  @click="deleteQuestion(question)"
                >
                  <i class="bi bi-trash-fill"></i>
                </button>
              </div>
              <!-- END FOOTER DE LA PREGUNTA -->
            </div>
            <!-- END PREGUNTA -->
          </div>
        </div>
        <!-- END PREGUNTAS DE LA ETAPA -->

        <!-- FOOTER DE LA ETAPA -->
        <div class="card-footer text-center">
          <input type="submit" class="btn btn-primary m-0" value="Finalizar" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import QuestionComponent from "../../../components/Admins/builder/QuestionComponent.vue";
import axios from "axios";

export default {
  name: "create-page",
  data() {
    return {
      validated: true,
      title: "",
      description: "",
      counter: 1,
      questions: [
        {
          order: 1,
          answers: [
            { order: 1, name: "" },
            { order: 2, name: "" },
            { order: 3, name: "" },
          ],
          type_selected: 1,
          types: "",
          title: "",
        },
      ],
    };
  },
  methods: {
    addQuestion() {
      this.questions.push({
        order: ++this.counter,
        answers: [
          { order: 1, name: "" },
          { order: 2, name: "" },
          { order: 3, name: "" },
        ],
        type_selected: 1,
        types: "",
        title: "",
      });
    },
    deleteQuestion(question) {
      this.questions.pop(question);
      this.counter--;
    },
    createStage() {
      this.questionsValidate();
      this.answersValidate();

      if (this.title && this.description && this.validated) {
        let stage = {
          title: this.title,
          description: this.description,
          questions: this.questions,
        };
        axios.post("/api/stages", { stage }).then((resp) => console.log(resp.data));
      }
    },
    questionsValidate() {
      this.questions.forEach((q) => {
        if (!q.type_selected || !q.title) {
          this.validated = false;
        }
      });
    },
    answersValidate() {
      this.questions.forEach((q) => {
        q.answers.forEach((a) => {
          if (!a.name) {
            this.validated = false;
          }
        });
      });
    },
  },
  components: {
    QuestionComponent,
  },
};
</script>

<style>
</style>
