<template>
  <!-- 1<pre>{{ props.posts.test }}</pre>2 -->
  <div>
    <!-- Logo for light mode -->
    <img :src="logoBlack" class="block dark:hidden" alt="light" width="35px">
    
    <!-- Logo for dark mode -->
    <img :src="logoWhite" class="hidden dark:block" alt="dark" width="50px">
  </div>
</template>

<script setup>

const props = defineProps({
  logoBlack: String,
  logoWhite: String
})

</script>
