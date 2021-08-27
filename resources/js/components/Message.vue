<template>
    <div>
        <div class="card mb-3" :class="border">
            <div class="card-header d-flex justify-content-between" style="padding:0.25rem 1rem">
                <span>{{ name }}</span>
                <span class="text-muted">{{ moment(message.created_at).format('DD.MM.YY HH:mm') }}</span>
            </div>
            <div class="card-body" style="padding:0.50rem 1rem">
                <p class="card-text">{{ message.content }}</p>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from 'moment'

    export default {
        props: {
            message: {
                type: Object
            },
            recipient: {
                type: Object
            },
            owner: {
                type: Object
            }
        },
        data() {
            return {
                moment: moment
            }
        },
        computed: {
            name() {
                return this.isOwnerMessage ?
                    this.owner.name :
                    this.recipient.name
            },
            border() {
                return this.isOwnerMessage ?
                    'border-primary' :
                    'border-secondary'
            },
            isOwnerMessage() {
                return this.message.owner_id === this.owner.id
            }
        }
    }
</script>
