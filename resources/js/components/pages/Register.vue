<template>
    <v-app>
        <v-container fill-height>
            <v-row justify="center">
                <v-card width="500" elevation="12">
                    <v-card-title>Register</v-card-title>
                    <v-card-text>
                        <v-row dense>
                            <v-col class="mx-2 mt-4">
                                <v-text-field
                                    dense
                                    outlined
                                    label="Email"
                                    v-model="credentials.email"
                                    @keyup.enter="createUser()"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    outlined
                                    label="Password"
                                    type="password"
                                    v-model="credentials.password"
                                    @keyup.enter="createUser()"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions class="mt-n5">
                        <v-btn text small @click="goToLogin()">I already have an account</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn color="secondary" @click="createUser()"
                            >Register</v-btn
                        >
                    </v-card-actions>
                </v-card>
            </v-row>
        </v-container>
    </v-app>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            credentials: {},
            token: null
        };
    },
    methods: {
        goToLogin() {
            this.$router.push('/login')
        },
        createUser() {
            let email = this.credentials.email
            let password = this.credentials.password
            // API
            axios.post('api/register', {email, password}).then(response => {
                console.log(response)
            }).catch(errors => {
                console.log(errors)
            })
        },
    }
};
</script>
