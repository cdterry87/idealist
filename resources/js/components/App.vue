<template>
    <div id="main">
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <SubmitIdeas />
                    <RateIdeas />
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
import RateIdeas from './RateIdeas';
import TopIdeas from './TopIdeas';

export default {
    name: 'App',
    components: {
        SubmitIdeas,
        RateIdeas,
        TopIdeas
    }
}
</script>
