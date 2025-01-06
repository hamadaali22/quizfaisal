import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);

const messages = {
    en: {
        logIn: 'Log in',
        signUp: 'Sign up ',
        // أضف المزيد من المفاتيح هنا
    },
    ar: {
        logIn: 'تسجيل الدخول',
        signUp: 'إنشاء حساب',
        // أضف المزيد من المفاتيح هنا
    },
    de: {
        logIn: 'Log in',
        signUp: 'Sign up ',
        // أضف المزيد من المفاتيح هنا
    },
    fr: {
        logIn: 'Log in',
        signUp: 'Sign up ',
        // أضف المزيد من المفاتيح هنا
    },
    es: {
        logIn: 'Log in',
        signUp: 'Sign up ',
        // أضف المزيد من المفاتيح هنا
    },
};

const i18n = new VueI18n({
    locale: 'en', // اللغة الافتراضية
    fallbackLocale: 'en', // اللغة الاحتياطية
    messages,
});

export default i18n;
