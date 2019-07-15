<template>
    <div>
        <table class="table text-center">
            <thead>
            <th>#</th>
            <th >Titulo</th>
            <th >Descripcion</th>
            <th>acciones</th>
            </thead>

            <tbody>
                <template v-for="stage in stages">
                    <stage-component :stage="stage" :key="stage.id"></stage-component>
                </template>
            </tbody>

        </table>

    </div>
</template>

<script>
    import axios from "axios";
    import StageComponent from './StageComponent.vue'

    export default {
        name: "stages-component",
        data() {
            return {
                stages: [],
            }
        },
        methods: {
            getUrlEdit(id) {
                return 'edit/' . id
            }
        },
        mounted() {
            axios.get('stages').then(response => this.stages = response.data);
        },
        components: {
            'stage-component': StageComponent
        }
    }
</script>

<style scoped>

</style>