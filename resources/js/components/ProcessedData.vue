<template>
    <div>
        <h2>Processed Data</h2>
        <p>ID: {{ processedData.id }}</p>
        <p>Title: {{ processedData.title }}</p>
        <p>Content: {{ processedData.content }}</p>

    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    computed: {
        processedData() {
            return this.$store.state.processedData;
        }
    }
};
</script>
