<template>
    <div id="main">
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <SubmitIdeas />
                    <VoteableIdeas />
                </div>
                <div class="column is-half">
                    <TopIdeas />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SubmitIdeas from './SubmitIdeas';
import VoteableIdeas from './VoteableIdeas';
import TopIdeas from './TopIdeas';

export default {
    name: 'App',
    components: {
        SubmitIdeas,
        VoteableIdeas,
        TopIdeas
    }
}
</script>
