<template>
    <div class="box">
        <form method="POST" @submit.prevent="submitIdea">
            <h2 class="title is-5 has-text-centered">Submit your ideas!</h2>
            <hr>
            <div class="field has-addons">
                <div class="control has-icons-left is-expanded">
                    <textarea name="idea" id="idea" v-model="idea" class="textarea" rows="2" placeholder="This could be your best idea yet!"></textarea>
                </div>
            </div>
            <div class="control">
                <div class="control">
                    <button class="button is-info is-fullwidth">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import EventBus from './../eventbus'

export default {
    name: 'SubmitIdeas',
    data() {
        return {
            idea: '',
        }
    },
    methods: {
        submitIdea() {
            let idea = this.idea

            axios.post('idea', { idea })
            .then(response => {
                let idea = response.data

                EventBus.$emit('ideaSubmitted', idea)
            })

            this.idea = ''
        }
    }
}
</script>
