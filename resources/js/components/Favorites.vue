<template>
    <div>
        <Idea v-for="idea in ideas" :key="idea.id" :idea="idea.idea" :vote="false" :favoriteId="idea.id" />
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
    mounted() {
        this.getFavorites()
    }
}
</script>
