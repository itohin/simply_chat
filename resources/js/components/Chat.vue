<template>
    <div>
        <div class="row">
            <div class="col border-bottom pb-3 d-flex justify-content-between">
                <div>
                    <span class="h4">{{ recipient.name }}</span>
                    <span class="text-muted">({{ recipient.email }})</span>
                </div>
                <button class="btn btn-outline-primary" @click.prevent="getMessages">Обновить</button>
            </div>
        </div>
        <div class="row mt-5" style="margin-bottom: 9rem">
            <div class="col">
                <message
                    v-for="message in messages"
                    :message="message"
                    :owner="owner"
                    :recipient="recipient"
                    :key="message.id">
                </message>
            </div>
        </div>
        <message-form
            :error="error"
            @send="sendMessage"
            @clearError="error = null">
        </message-form>
    </div>
</template>
<script>
    import MessageForm from './MessageForm'
    import Message from './Message'

    export default {
        props: {
            chat: {
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
                messages: [],
                error: null
            }
        },
        methods: {
            sendMessage(message) {
                axios.post('/chats/' + this.chat.id + '/messages/' + this.owner.id + '/' + this.recipient.id, {
                    message
                })
                .then(({data}) => {
                    this.messages.push(data.message)
                })
                .catch(({response}) => {
                    if (response.status === 422) {
                        this.error = response.data.errors.message[0]
                    }
                })
            },
            getMessages() {
                axios.get('/chats/' + this.chat.id + '/messages')
                .then(({data}) => {
                    this.messages = data.messages
                })
            }
        },
        created() {
            this.getMessages();
        },
        components: {
            MessageForm,
            Message
        }

    }
</script>
