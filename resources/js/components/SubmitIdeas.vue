<template>
    <div class="box">
        <h2 class="title is-5 has-text-centered">Submit your ideas!</h2>
        <hr>
        <div class="field has-addons">
            <div class="control has-icons-left is-expanded">
                <textarea name="idea" id="idea" class="textarea" rows="2" placeholder="This could be your best idea yet!"></textarea>
            </div>
        </div>
        <div class="control">
            <div class="control">
                <button class="button is-info is-fullwidth">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SubmitIdeas'
}
</script>
