<template>
    <div>
        <tabs>
            <tab name="Settings" icon="fas fa-cogs" :selected="true">
                <Settings />
            </tab>
            <tab name="My Ideas" icon="fas fa-lightbulb">
                <MyIdeas />
            </tab>
            <tab name="Favorites" icon="fas fa-star">
                <Favorites />
            </tab>
            <tab name="History" icon="fas fa-history">
                <History />
            </tab>
        </tabs>
    </div>
</template>

<script>
import Settings from './Settings'
import MyIdeas from './MyIdeas'
import Favorites from './Favorites'
import History from './History'

export default {
    name: 'Account',
    components: {
        Settings,
        MyIdeas,
        Favorites,
        History
    }
}
</script>
