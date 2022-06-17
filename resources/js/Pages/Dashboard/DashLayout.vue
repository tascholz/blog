<template>
  <div class="flex flex-row min-w-full rounded-lg ">
      <div class="basis-1/4">
        <Sidebar></Sidebar>
      </div>
      <div class="min-w-full rounded-lg px-4">
        <slot/>
      </div>
  </div>
  
</template>

<script setup>
    import Sidebar from "./Sidebar.vue";
</script>