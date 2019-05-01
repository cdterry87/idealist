<template>
    <div>
        <div v-if="ideas.length == 0" class="has-text-centered">
            You do not currently have any history.
        </div>
        <Idea v-else v-for="idea in ideas" :key="idea.id" :idea="idea.idea" :user="idea.idea.user" :history="idea" :vote="false" :favoriteId="idea.id" />
    </div>
</template>

<script>
import EventBus from './../eventbus'
import Idea from './Idea'

export default {
    name: 'History',
    data() {
        return {
            ideas: []
        }
    },
    components: {
        Idea
    },
    methods: {
        getHistory() {
            axios.get('history')
            .then(response => {
                this.ideas = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
    },
    created() {
        EventBus.$on('getIdeas', () => {
            this.getHistory()
        })
    },
    mounted() {
        this.getHistory()
    }
}
</script>
