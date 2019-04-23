<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Top ideas</h2>
        <hr>
        <Idea :vote="false" />
    </div>
</template>

<script>
import Idea from './Idea'

export default {
    name: 'TopIdeas',
    components: {
        Idea
    }
}
</script>
