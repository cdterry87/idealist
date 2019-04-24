<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Top ideas</h2>
        <hr>
        <Idea :vote="false" v-for="idea in ideas" :key="idea.id" :idea="idea" />
    </div>
</template>

<script>
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
            axios.get('api/ideas/top')
            .then(response => {
                this.ideas = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.error);
            });
        },
    },
    mounted() {
        this.getTopIdeas()
    }
}
</script>
