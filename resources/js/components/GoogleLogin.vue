<template>
    <div>
        <GoogleLogin :client-id="clientId" @success="onSignInSuccess" @error="onSignInError" />
    </div>
</template>

<script>
import GoogleLogin from 'vue-google-login';

export default {
    name: 'GoogleLogin',
    components: {
        GoogleLogin
    },
    data() {
        return {
            clientId: '1006839507668-oog5j5nagl9mq8p79201n0mil73u23sd.apps.googleusercontent.com'
        };
    },
    methods: {
        onSignInSuccess(googleUser) {
            const profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
            // تعامل مع معلومات المستخدم الموقع هنا
        },
        onSignInError(error) {
            console.error('Google Sign-In Error:', error);
            // تعامل مع الخطأ هنا
        }
    }
};
</script>

<style scoped>
/* أضف أي أنماط مخصصة هنا */
</style>
