<template>
    <article class="media">
        <div class="media-content">
            <div class="content">
                {{ idea.idea }}
                <div class="level">
                    <div class="level-left is-size-7 has-text-grey">
                        Submitted {{ idea.elapsed_time }} <span class="space" v-if="vote != true">by {{ user.name }}</span>
                    </div>
                    <div class="level-right is-size-7 has-text-link" v-if="history">
                        You {{ history.action }} this idea {{ history.elapsed_time }}
                    </div>
                </div>
            </div>
        </div>
        <div class="media-right" v-if="!history">
            <span class="icon is-small" v-if="vote == true" @click="upvote(idea.id)">
                <i class="fa fa-arrow-circle-up"></i>
            </span>
            <span class="icon is-small" v-if="vote == true" @click="downvote(idea.id)">
                <i class="fa fa-arrow-circle-down"></i>
            </span>
            <span class="icon is-small" @click="unFavorite(idea.id, favoriteId)" v-if="favoriteId">
                <i class="fa fa-star" :class="'has-text-info'"></i>
            </span>
            <span class="icon is-small" @click="favorite(idea.id)" v-else>
                <i class="fa fa-star"></i>
            </span>
            <span class="icon is-small" v-if="vote == false">
                <div class="tag">
                    {{ idea.votes }}
                </div>
            </span>
        </div>
    </article>
</template>

<script>
import EventBus from './../eventbus'

export default {
    name: 'Idea',
    props: ['vote', 'history', 'idea', 'user', 'favoriteId'],
    methods: {
        upvote(id) {
            axios.post('upvote/' + id)
            .then(response => {
                let idea = response.data

                EventBus.$emit('ideaVoted', idea)
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
        downvote(id) {
            axios.post('downvote/' + id)
            .then(response => {
                let idea = response.data

                EventBus.$emit('ideaVoted', idea)
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
        favorite(id) {
            axios.post('favorite/' + id)
            .then(response => {
                EventBus.$emit('getIdeas')
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
        unFavorite(idea_id, id) {
            axios.delete('favorite/' + idea_id + '/' + id)
            .then(response => {
                EventBus.$emit('getIdeas')
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
    }
}
</script>
