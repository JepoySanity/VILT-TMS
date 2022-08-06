<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
</script>
<template>
  <li><Link :href="route('to.dashboard')">Dashboard</Link></li>
  <li v-if="$page.props.auth.role == 'agent'"><a>Link for agents</a></li>
</template>