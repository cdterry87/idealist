<template>
    <div>
        <div class="columns">
            <div class="column is-4">
                <h3 class="subtitle">Update Profile</h3>
                <form action="/account" method="POST" @submit.prevent="updateProfile">
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <div class="control">
                            <input type="text" class="input" name="name" v-model="name" maxlength="255">
                        </div>
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <div class="control">
                            <input type="email" class="input" name="email" v-model="email" maxlength="255">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-info">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="column is-4">
                <h3 class="subtitle">Change Password</h3>
                <form action="/password" method="POST" @submit.prevent="updatePassword">
                    <div class="field">
                        <label for="password" class="label">New Password</label>
                        <div class="control">
                            <input type="password" class="input" name="password" id="password" v-model="password">
                        </div>
                    </div>
                    <div class="field">
                        <label for="password_confirmation" class="label">Confirm Password</label>
                        <div class="control">
                            <input type="password" class="input" name="password_confirmation" id="password_confirmation" v-model="password_confirmation">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-info">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="column is-4">
                <h3 class="subtitle">Theme Settings</h3>
                <div class="field">
                    <div class="control">
                        <div class="field">
                            <input id="dark" type="checkbox" v-model="dark" name="dark" class="switch is-info" :checked="(dark ? 'checked' : '')" @click="updateTheme">
                            <label for="dark">Dark Mode</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Settings',
    data() {
        return {
            user: '',
            dark: false,
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }
    },
    methods: {
        getUser() {
            axios.get('user')
            .then(response => {
                this.user = response.data
                this.dark = this.user.dark
                this.name = this.user.name
                this.email = this.user.email
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
        updateProfile() {
            let name = this.name
            let email = this.email

            axios.post('/profile', { name, email })
            .then(response => {
                this.name = response.data.name
                this.email = response.data.email
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
        updatePassword() {
            let password = this.password
            let password_confirmation = this.password_confirmation

            if (password === password_confirmation) {
                axios.post('/password', { password })
                .then(response => {
                    console.log('Password updated!')
                })
                .catch(function (error) {
                    console.log(error.response.data.error)
                });
            }
        },
        updateTheme() {
            let dark = !this.dark

            axios.post('/theme', { dark })
            .then(response => {
                this.dark = response.data.dark
                location.reload();
            })
            .catch(function (error) {
                console.log(error.response.data.error)
            });
        },
    },
    mounted (){
        this.getUser();
    }
}
</script>
