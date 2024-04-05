<template>
    <div>
        <section class="row home-main-section p-5 container-fluid">
            <div class="col-lg m-auto pl-4">
                <p v-html="contactInfo.placement_desc"></p>
                <router-link :to="'/placement-questions'" class="a-link">
                    <div class="level  w-50 text-center text-light mt-1 pt-2 pb-2">
                        Start Test
                    </div>
                </router-link>
            </div>


        </section>
    </div>
</template>
<script>

export default {
    data() {
        return {

        }

    },
    computed: {

        contactInfo() {
            return this.$store.state.contactInfo
        }
    },

    mounted() {
        this.$store.dispatch('getContactinfo');
    },

    methods: {

    },


}
</script>