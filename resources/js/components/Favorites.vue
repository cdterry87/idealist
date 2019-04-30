<template>
    <div>
        <div v-if="ideas.length == 0" class="has-text-centered">
            You have not added any favorites.
        </div>
        <Idea v-else v-for="idea in ideas" :key="idea.id" :idea="idea.idea" :user="idea.user" :vote="false" :favoriteId="idea.id" />
    </div>
</template>

<script>
import EventBus from './../eventbus'
import Idea from './Idea'

export default {
    name: 'Favorites',
    data() {
        return {
            ideas: []
        }
    },
    components: {
        Idea
    },
    methods: {
        getFavorites() {
            axios.get('favorite')
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
            this.getFavorites()
        })
    },
    mounted() {
        this.getFavorites()
    }
}
</script>
