<template>
    <article class="media">
        <figure class="media-left">
            <p class="image is-32x32" v-if="vote == false">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                {{ idea.idea }}
            </div>
        </div>
        <div class="media-right">
            <span class="icon is-small" v-if="vote == true" @click="upvote(idea.id)">
                <i class="fa fa-arrow-circle-up"></i>
            </span>
            <span class="icon is-small" v-if="vote == true" @click="downvote(idea.id)">
                <i class="fa fa-arrow-circle-down"></i>
            </span>
            <span class="icon is-small">
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
    props: ['vote', 'idea'],
    methods: {
        upvote(id) {
            axios.post('upvote/' + id)
            .then(response => {
                let idea = response.data

                console.log('idea', idea)

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
        }
    },
}
</script>
