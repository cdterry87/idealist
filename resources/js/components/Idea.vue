<template>
    <article class="media">
        <figure class="media-left">
            <p class="image is-32x32" v-if="vote == false">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus maximus leo nec massa viverra, et scelerisque ante vestibulum.
            </div>
        </div>
        <div class="media-right">
            <span class="icon is-small" v-if="vote == true">
                <i class="fa fa-arrow-up"></i>
            </span>
            <span class="icon is-small" v-if="vote == true">
                <i class="fa fa-arrow-down"></i>
            </span>
            <span class="icon is-small">
                <i class="fa fa-star"></i>
            </span>
        </div>
    </article>
</template>

<script>
export default {
    name: 'Idea',
    props: ['vote'],
}
</script>
