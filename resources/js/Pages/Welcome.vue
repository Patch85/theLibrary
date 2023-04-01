<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    appVersion: String,
    appName: String,
    currentYear: Number,
});
</script>

<style>
.autumn {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='88' height='24' viewBox='0 0 88 24'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='autumn' fill='%23d97706' fill-opacity='0.19'%3E%3Cpath d='M10 0l30 15 2 1V2.18A10 10 0 0 0 41.76 0H39.7a8 8 0 0 1 .3 2.18v10.58L14.47 0H10zm31.76 24a10 10 0 0 0-5.29-6.76L4 1 2 0v13.82a10 10 0 0 0 5.53 8.94L10 24h4.47l-6.05-3.02A8 8 0 0 1 4 13.82V3.24l31.58 15.78A8 8 0 0 1 39.7 24h2.06zM78 24l2.47-1.24A10 10 0 0 0 86 13.82V0l-2 1-32.47 16.24A10 10 0 0 0 46.24 24h2.06a8 8 0 0 1 4.12-4.98L84 3.24v10.58a8 8 0 0 1-4.42 7.16L73.53 24H78zm0-24L48 15l-2 1V2.18A10 10 0 0 1 46.24 0h2.06a8 8 0 0 0-.3 2.18v10.58L73.53 0H78z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>

<template>
    <Head title="Welcome" />

    <div
         class="grid w-screen h-screen autumn selection:bg-amber-500 selection:text-emerald-900 dark:text-amber-500 dark:bg-emerald-900">

        <!-- Breeze Auth Bar -->
        <nav v-if="canLogin"
             class="row-auto p-6 text-right sm:fixed sm:top-0 sm:right-0">
            <Link v-if="$page.props.auth.user"
                  :href="route('dashboard')"
                  class="font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-emerald-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                      class="font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-emerald-500">
                Log in</Link>

                <Link v-if="canRegister"
                      :href="route('register')"
                      class="ml-4 font-semibold focus:outline focus:outline-2 focus:rounded-sm focus:outline-emerald-500">
                Register</Link>
            </template>
        </nav>

        <main class="row h-3/4">
            <h1 class="text-6xl font-extrabold">The Library</h1>
        </main>

        <!-- Footer -->
        <div class="row-auto p-6 mx-auto">
            <div class="flex content-around">
                <span class="px-2">{{ appName }} &copy; 2022 - {{ currentYear }}</span>
                <ApplicationLogo />
                <span class="pl-2">v{{ appVersion }}</span>
            </div>
        </div>
    </div>
</template>

