<template>
    
</template>

<script>
export default {
    data(){
        return{
            Email:undefined,
            Password:undefined,
        }
    },
    created(){
        localStorage.removeItem('AtmaAuto.jwt');
    }
}
</script>
