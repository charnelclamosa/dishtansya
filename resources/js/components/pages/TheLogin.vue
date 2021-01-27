<template>
    <v-app>
        <v-container fill-height>
            <v-row justify="center">
                <v-card width="500" elevation="12">
                    <v-card-title>Login</v-card-title>
                    <v-card-text>
                        <v-row dense>
                            <v-col class="mx-2 mt-4">
                                <v-text-field
                                    dense
                                    outlined
                                    label="Email"
                                    v-model="credentials.email"
                                    @keyup.enter="handleLogin()"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    outlined
                                    label="Password"
                                    type="password"
                                    v-model="credentials.password"
                                    @keyup.enter="handleLogin()"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions class="mt-n5">
                        <v-btn text small @click="goToRegister()"
                            >Don't have an account?</v-btn
                        >
                        <v-spacer></v-spacer>
                        <v-btn color="secondary" @click="handleLogin()">Login</v-btn>
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
            access_token: null
        };
    },
    methods: {
        goToRegister() {
            this.$router.push("/register");
        },
        handleLogin() {
            let email = this.credentials.email;
            let password = this.credentials.password;
            axios
                .post("api/login", {
                    email,
                    password
                })
                .then(response => {
                    if(response.data.access_token) {
                        // Set authorization token
                        localStorage.setItem('access_token', response.data.access_token);
                        this.access_token = response.data.access_token;
                        axios.defaults.headers.common["Authorization"] = `Bearer ${this.access_token}`;
                        // Redirect to home page
                        this.$router.push('/home')
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
    }
};
</script>
