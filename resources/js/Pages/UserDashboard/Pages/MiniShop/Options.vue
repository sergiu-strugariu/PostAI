scri<script setup>
import AllPlans from './AllPlans.vue';
</script>

<template>
    <div>
        <AllPlans />
    </div>
</template>

<script>
export default {
    props: {
        platform: String
    }
}
</script>