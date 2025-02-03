<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link
                        :href="route('home')"
                        class="nav-link"
                    >
                        Home
                    </Link>
                </div>
                <div class="space-x-6">
                    <Link
                        v-if="!$page.props.auth.is_authenticated"
                        :href="route('register')"
                        class="nav-link"
                    >
                        Register
                    </Link>

                    <Link
                        v-if="!$page.props.auth.is_authenticated"
                        :href="route('login')"
                        class="nav-link"
                    >
                        Login
                    </Link>

                    <Link
                        v-if="$page.props.auth.is_authenticated"
                        :href="route('logout')"
                        class="nav-link"
                        method="post"
                        as="button"
                    >
                        Logout
                    </Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
