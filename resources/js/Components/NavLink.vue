<script setup>
    defineProps({
        routeName: {
            type: String,
            required: true,
        },
        isActive: {
            type: Boolean,
            default: false,
        },
    });
</script>

<template>
    <Link
        :href="route(routeName)"
        class="nav-link"
        :class="{ 'bg-slate-700': isActive }"
    >
        <slot />
    </Link>
</template>
