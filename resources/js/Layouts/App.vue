<template>
    <div>
        <h1>Hello World!</h1>
        <router-link :to="{ name: 'AddNew' }">Add New</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {

}
</script>

