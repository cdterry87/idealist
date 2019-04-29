<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Top ideas</h2>
        <hr>
        <Idea :vote="false" v-for="idea in sortedIdeas" :key="idea.id" :idea="idea" :favoriteId="(idea.favorite ? idea.favorite.id : false) "/>
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
            // Remove the previous idea from the array
            let removeIdea = this.ideas.find(rmIdea => rmIdea.id === idea.id)
            this.ideas = this.ideas.filter(function( obj ) {
                return obj.id !== removeIdea.id;
            });

            // Add the new idea to the array
            this.ideas.push(idea)
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
