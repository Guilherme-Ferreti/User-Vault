<script setup>
    import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <NavLink
                        routeName="home"
                        :is-active="route().current('home')"
                        >Home</NavLink
                    >
                </div>
                <div
                    v-if="$page.props.auth.is_authenticated"
                    class="space-x-6 flex"
                >
                    <img
                        class="avatar"
                        :src="$page.props.auth.user.avatar"
                        alt=""
                    />
                    <NavLink
                        routeName="dashboard"
                        :is-active="route().current('dashboard')"
                        >Dashboard</NavLink
                    >

                    <Link
                        :href="route('logout')"
                        class="nav-link"
                        method="post"
                        as="button"
                    >
                        Logout
                    </Link>
                </div>
                <div
                    v-else
                    class="space-x-6"
                >
                    <NavLink
                        routeName="register"
                        :is-active="route().current('register')"
                        >Register</NavLink
                    >
                    <NavLink
                        routeName="login"
                        :is-active="route().current('login')"
                        >Login</NavLink
                    >
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
