
<template>
      <div class="stepperContent" style="padding: 2rem 3rem;">
        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                <input :class="['input', ($v.form.nombre.$error) ? 'is-danger' : '']" type="text" placeholder="Text input"
                       v-model="form.nombre">
            </div>
            <p v-if="$v.form.nombre.$error" class="help is-danger">El nombre es inválido</p>
        </div>
        <div class="field">
            <label class="label">Apellido</label>
            <div class="control">
                <input :class="['input', ($v.form.apellido.$error) ? 'is-danger' : '']" type="text" placeholder="Text input"
                       v-model="form.apellido">
            </div>
            <p v-if="$v.form.apellido.$error" class="help is-danger">El apellido es inválido</p>
        </div>
        <div class="field">
            <label class="label">Cédula</label>
            <div class="control">
                <input :class="['input', ($v.form.cedula.$error) ? 'is-danger' : '']" type="text" placeholder="Text input"
                       v-model="form.cedula">
            </div>
            <p v-if="$v.form.cedula.$error" class="help is-danger">Número de cédula inválido</p>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input :class="['input', ($v.form.email.$error) ? 'is-danger' : '']"  type="text" placeholder="Email input" v-model="form.email">
            </div>
            <p v-if="$v.form.email.$error" class="help is-danger">Email inválido</p>
        </div>
        <!-- <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea :class="['textarea', ($v.form.message.$error) ? 'is-danger' : '']"  placeholder="Textarea" v-model="form.message"></textarea>
            </div>
        </div> -->
    </div>
</template>

<script>
 import {validationMixin} from 'vuelidate'
    import {required, email} from 'vuelidate/lib/validators'

    export default {
        props: ['clickedNext', 'currentStep'],
        mixins: [validationMixin],
        data() {
            return {
                form: {
                    nombre: '',
                    apellido: '',
                    cedula: '',
                    email: ''
                }
            }
        },
        validations: {
            form: {
                nombre: {
                    required
                },
                apellido: {
                    required,
                },
                cedula: {
                    required
                    
                },
                email: {
                    required,
                    email
                }
            }
        },
        watch: {
            $v: {
                handler: function (val) {
                    if(!val.$invalid) {
                        this.$emit('can-continue', {value: true});
                    } else {
                        this.$emit('can-continue', {value: false});
                    }
                },
                deep: true
            },
            clickedNext(val) {
                if(val === true) {
                    this.$v.form.$touch();
                }
            }
        },
        mounted() {
            if(!this.$v.$invalid) {
                this.$emit('can-continue', {value: true});
            } else {
                this.$emit('can-continue', {value: false});
            }
        }
    }
</script>

