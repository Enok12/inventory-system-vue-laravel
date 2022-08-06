<template>
  
</template>

<script>

export default{
    created(){
         localStorage.removeItem('token');
        localStorage.removeItem('user');

         //Toast Message
      Toast.fire({
      icon: 'success',
      title: 'Logout Successfuly'
      })

      this.$router.push({name:'/'})
    }
}

</script>

<style scoped>

</style>
