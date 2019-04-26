<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">My ideas</h2>
        <hr>
        <Idea :vote="false" v-for="idea in ideas" :key="idea.id" :idea="idea" />
    </div>
</template>

<script>
import EventBus from './../eventbus'
import Idea from './Idea'

export default {
    name: 'MyIdeas',
    data() {
        return {
            ideas: []
        }
    },
    components: {
        Idea
    },
    methods: {
        getMyIdeas() {
            axios.get('ideas/my')
            .then(response => {
                this.ideas = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
    },
    mounted() {
        this.getMyIdeas()
    }
}
</script>
