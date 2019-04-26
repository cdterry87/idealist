<template>
    <div class="container">
         <div class="columns">
            <div class="column is-3">
                <div class="box">
                    <div class="buttons">
                        <a href="/settings" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-cogs"></i>
                            </span>
                            <span>Settings</span>
                        </a>
                        <a href="/myideas" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-lightbulb"></i>
                            </span>
                            <span>My Ideas</span>
                        </a>
                        <a href="/favorites" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-star"></i>
                            </span>
                            <span>Favorites</span>
                        </a>
                        <a href="/history" class="button is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-history"></i>
                            </span>
                            <span>History</span>
                        </a>
                        <a href="/logout" class="button is-fullwidth is-danger"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
                    </div>
                </div>
            </div>
            <div class="column is-9">
                <div class="box">
                    <h2 class="title is-5 has-text-centered">My ideas</h2>
                    <hr>
                    <Idea :vote="false" v-for="idea in ideas" :key="idea.id" :idea="idea" />
                </div>
            </div>
        </div>
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
