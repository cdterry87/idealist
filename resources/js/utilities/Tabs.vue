<template>
    <div>
        <div class="tabs is-centered">
            <ul>
                <li v-for="(tab, index) in tabs" :key="index" :class="{'is-active' : tab.isActive }">
                    <a @click="selectTab(tab)">
                        <span class="icon"><i :class="tab.icon"></i></span>
                        <span>{{ tab.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    name: 'Tabs',
    data() {
        return {
            tabs: []
        }
    },
    created() {
        this.tabs = this.$children
        console.log('tabs', this.tabs)
    },
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(
                function(tab) {
                    tab.isActive = (selectedTab.name == tab.name)
                }
            )
        }
    }
}
</script>
