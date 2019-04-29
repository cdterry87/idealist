<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Cast your votes!</h2>
        <hr>
        <div v-if="ideas.length == 0" class="has-text-centered">
            There are no new ideas at this time.  Try again later.
        </div>
        <Idea v-else v-for="idea in ideas" :key="idea.id" :idea="idea" :favoriteId="(idea.user_favorite ? idea.user_favorite.id : false)" :vote="true" />
    </div>
</template>

<script>
import EventBus from './../eventbus'
import Idea from './Idea'

export default {
    name: 'VoteableIdeas',
    components: {
        Idea
    },
    data() {
        return {
            user: '',
            ideas: []
        }
    },
    methods: {
        getVoteableIdeas() {
            axios.get('voteable')
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
        }),
        EventBus.$on('ideaVoted', idea => {
            // Remove the previous idea from the array
            let removeIdea = this.ideas.find(rmIdea => rmIdea.id === idea.id)
            if (typeof(removeIdea) != 'undefined') {
                this.ideas = this.ideas.filter(function( obj ) {
                    return obj.id !== removeIdea.id;
                });
            }
        })
        EventBus.$on('getIdeas', () => {
            this.getVoteableIdeas()
        })
    },
    mounted() {
        this.getVoteableIdeas()
    }
}
</script>
