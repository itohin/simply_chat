<template>
    <div class="fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div v-if="isError" class="invalid-feedback d-block mb-2">{{ error }}</div>
                    <textarea
                        class="form-control"
                        :class="{'is-invalid': isError}"
                        cols="30" rows="3"
                        v-model="message"
                        @keyup.enter.prevent="send"
                        @input="$emit('clearError')"
                    >
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            error: {
                type: String,
                default: null
            }
        },
        data() {
            return {
                message: ''
            }
        },
        methods: {
            send() {
                this.$emit('send', this.message)
                this.message = ''
            }
        },
        computed: {
            isError() {
                return this.error !== null
            }
        }
    }
</script>
