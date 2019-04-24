<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Cast your votes!</h2>
        <hr>
        <Idea :vote="true" v-for="idea in ideas" :key="idea.id" :idea="idea" />
    </div>
</template>

<script>
import Idea from './Idea'

export default {
    name: 'RateIdeas',
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
            axios.get('ideas/top')
            .then(response => {
                this.ideas = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.error);
            });
        },
    },
    mounted() {
        this.getVoteableIdeas()
    }
}
</script>
