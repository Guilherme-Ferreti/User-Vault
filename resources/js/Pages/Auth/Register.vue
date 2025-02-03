<script setup>
    import { useForm } from '@inertiajs/vue3';
    import TextInput from '../../Components/TextInput.vue';

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    const submit = () => {
        form.post(route('register.store'), {
            onError: () => form.reset('password', 'password_confirmation'),
        });
    };
</script>

<template>
    <Head title="Register" />

    <h1 class="title">Register a new account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput
                v-model="form.name"
                :error="form.errors.name"
                label="Name"
                type="text"
                required
            />

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

            <TextInput
                v-model="form.password_confirmation"
                :error="form.errors.password_confirmation"
                label="Confirm password"
                type="password"
                required
            />

            <div>
                <p class="text-slate-600 mb-2">
                    Already registered?
                    <Link
                        href="/login"
                        class="text-link"
                    >
                        Login
                    </Link>
                </p>
                <button
                    type="submit"
                    class="primary-btn"
                    :disabled="form.processing"
                >
                    Register
                </button>
            </div>
        </form>
    </div>
</template>
