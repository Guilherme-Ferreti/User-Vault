<script setup>
    import TextInput from '@/Components/TextInput.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        avatar: null,
    });

    const avatarPreview = ref('storage/avatars/default.jpeg');

    const changeAvatar = e => {
        form.avatar = e.target.files[0];
        avatarPreview.value = URL.createObjectURL(e.target.files[0]);
    };

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
            <div class="grid place-items-center">
                <div
                    class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
                >
                    <label
                        for="avatar"
                        class="absolute inset-0 grid content-end cursor-pointer"
                    >
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input
                        type="file"
                        @input="changeAvatar"
                        id="avatar"
                        hidden
                    />

                    <img
                        class="object-cover w-28 h-28"
                        :src="avatarPreview"
                    />
                </div>

                <p class="error mt-2">{{ form.errors.avatar }}</p>
            </div>

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
                        :href="route('login')"
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
