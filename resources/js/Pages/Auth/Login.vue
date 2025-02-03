<script setup>
    import TextInput from '@/Components/TextInput.vue';
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: null,
        password: null,
        remember: false,
    });

    const submit = () => {
        form.post(route('login.store'), {
            onError: () => form.reset('password'),
        });
    };
</script>

<template>
    <Head title="Login" />

    <h1 class="title">Login</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput
                v-model="form.email"
                :error="form.errors.email"
                label="Email address"
                type="email"
                required
                email
            />

            <TextInput
                v-model="form.password"
                :error="form.errors.password"
                label="Password"
                type="password"
                required
            />

            <div class="flex items-center gap-2 mb-2">
                <label for="remember">Remember me</label>
                <input
                    id="remember"
                    type="checkbox"
                    v-model="form.remember"
                />
            </div>

            <div class="mb-2">
                <p class="text-slate-600">
                    Don't have an account?
                    <Link
                        :href="route('register')"
                        class="text-link"
                    >
                        Register
                    </Link>
                </p>
            </div>

            <div>
                <button
                    type="submit"
                    class="primary-btn"
                    :disabled="form.processing"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</template>
