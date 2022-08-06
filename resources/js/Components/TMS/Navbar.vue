<script setup>
import Links from '@/Components/TMS/Links.vue';
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
</script>

<template>
  <div class="navbar bg-base-200">
    <div class="container mx-auto">
      <div class="flex-1">
          <Link :href="route('to.dashboard')" class="btn btn-ghost normal-case text-xl">
            TMS
          </Link>
      </div>
      <div class="flex-none">
        <ul class="menu menu-horizontal p-0">
          <component :is="Links" />
          <li tabindex="0">
            <a>
              {{$page.props.auth.fname}}
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
            </a>
            <ul class="p-2 bg-base-100">
              <li>
                <Link :href="route('logout')" method="post">
                  Logout
                </Link>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>