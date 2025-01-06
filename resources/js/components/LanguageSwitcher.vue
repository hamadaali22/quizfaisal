<template>
  <div>
    <button @click="changeLanguage('en')">English</button>
    <button @click="changeLanguage('ar')">العربية</button>
    <button @click="changeLanguage('de')">Deutsch</button>
    <button @click="changeLanguage('fr')">Français</button>
    <button @click="changeLanguage('es')">Español</button>
  </div>
</template>

<script>
export default {
    methods: {
        // changeLanguage(lang) {
        //   this.$i18n.locale = lang; // تغيير اللغة داخل Vue.js
        //   window.location.search = `?lang=${lang}`; // تحديث اللغة في الـ URL
        // },
        // changeLanguage(lang) {
        //     this.$i18n.locale = lang;
        //     const currentPath = window.location.pathname;
        //     const newPath = `/${lang}` + currentPath.replace(/^\/(en|ar)/, ''); // تعديل URL
        //     window.history.pushState(null, '', newPath); // تحديث عنوان URL دون تحديث الصفحة
        // }
        changeLanguage(lang) {
            this.$i18n.locale = lang; // تحديث اللغة في التطبيق
            localStorage.setItem('preferredLanguage', lang); // تخزين اللغة في localStorage
            const currentPath = window.location.pathname;
            const newPath = `/${lang}` + currentPath.replace(/^\/(en|ar|de|fr|es)/, ''); // تعديل URL
            window.history.pushState(null, '', newPath); // تحديث عنوان URL دون تحديث الصفحة
        }
    },
};
</script>
