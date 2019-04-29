<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Top ideas</h2>
        <hr>
        <div v-if="ideas.length == 0" class="has-text-centered">
            There are no top ideas at this time.  Try again later.
        </div>
        <Idea v-else v-for="idea in sortedIdeas" :key="idea.id" :idea="idea" :favoriteId="(idea.favorites[0] ? idea.favorites[0].id : false)" :vote="false" />
    </div>
</template>

<script>
import EventBus from './../eventbus'
import Idea from './Idea'

export default {
    name: 'TopIdeas',
    data() {
        return {
            user: '',
            ideas: []
        }
    },
    components: {
        Idea
    },
    methods: {
        getTopIdeas() {
            axios.get('top')
            .then(response => {
                this.ideas = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
    },
    created() {
        EventBus.$on('ideaSubmitted', idea => {
            this.ideas.push(idea)
        })
        EventBus.$on('ideaVoted', idea => {
            // Remove the previous idea from the array if it exists
            let removeIdea = this.ideas.find(rmIdea => rmIdea.id === idea.id)
            if (!typeof(removeIdea) == 'undefined') {
                this.ideas = this.ideas.filter(function( obj ) {
                    return obj.id !== removeIdea.id;
                });
            }

            // Add the new idea to the array
            this.ideas.push(idea)
        })
        EventBus.$on('getIdeas', () => {
            this.getTopIdeas()
        })
    },
    computed: {
        sortedIdeas() {
            return this.ideas.sort((a, b) => {
                return b.votes - a.votes
            });
        }
    },
    mounted() {
        this.getTopIdeas()
    }
}
</script>
