<template>
    <div>
        
        <button type="submit" @click.prevent="makesd" style="background: #3e83b3;color: #fff;" >
        result
    </button>
    </div>
</template>
<script>
export default{
    data() {
      return {
          
          horen:30
      }
  },
    methods: {
        makesd(){
            this.$root.$router.push({
                path: '/my-result/' + 2+'/'+8, 
                params: { test: 'testyy' }
            })
        }
    },
}
</script>