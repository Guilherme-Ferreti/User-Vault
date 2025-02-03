<script setup>
    import { useForm } from '@inertiajs/vue3';

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
            <div class="mb-6">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    required
                />
                <small v-if="form.errors.name">
                    {{ form.errors.name }}
                </small>
            </div>
            <div class="mb-6">
                <label for="email">E-mail address</label>
                <input
                    type="text"
                    id="email"
                    v-model="form.email"
                    required
                    email
                />
                <small v-if="form.errors.email">
                    {{ form.errors.email }}
                </small>
            </div>
            <div class="mb-6">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    v-model="form.password"
                    required
                />
                <small v-if="form.errors.password">
                    {{ form.errors.password }}
                </small>
            </div>
            <div class="mb-6">
                <label for="name">Password confirmation</label>
                <input
                    type="password"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    required
                />
                <small v-if="form.errors.password_confirmation">
                    {{ form.errors.password_confirmation }}
                </small>
            </div>

            <div>
                <p class="text-slate-600 mb-2">
                    Already registered? <Link href="/login">Login</Link>
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
