<template>
    <tr>
        <td>{{ stage.id }}</td>
        <td>{{ stage.title }}</td>
        <td>{{ stage.description }}</td>
        <td>
            <b-button>Editar</b-button>
<!--            <button type="button" class="btn btn-danger" data-toggle="modal" :data-target="value">-->
<!--                Eliminar-->
<!--            </button>-->
            <b-button variant="danger" v-b-modal="value">Eliminar</b-button>

            <b-modal :id="value" title="Eliminar Etapa" @ok="deleteStage(stage.id)">
                <p class="my-4 text-center">Desea eliminar la etapa?</p>
            </b-modal>


        </td>
    </tr>
</template>

<script>
    import axios from "axios";

    export default {
        name: "stage-component",
        data() {
            return {
                value: ''
            }
        },
        props: ['stage'],
        created() {
            this.value = `stage${this.stage.id}`
        },
        methods: {
            deleteStage(id) {
                axios.delete(`stages/${id}`)
                    .then(res => console.log(res))
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped>

</style>