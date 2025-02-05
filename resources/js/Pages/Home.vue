<script setup>
    import PaginationLinks from '@/Components/PaginationLinks.vue';
    import { router } from '@inertiajs/vue3';
    import { debounce } from 'lodash';
    import { ref, watch } from 'vue';

    const props = defineProps({
        users: Object,
        searchTerm: String,
    });

    const search = ref(props.searchTerm);

    watch(
        search,
        debounce(
            query =>
                router.get(
                    route('home'),
                    { search: query },
                    { preserveState: true },
                ),
            500,
        ),
    );
</script>

<template>
    <Head title="Homepage" />
    <div>
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input
                    type="search"
                    placeholder="Search"
                    v-model="search"
                />
            </div>
        </div>
    </div>
    <div>
        <table>
            <thead>
                <tr class="bg-slate-300">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th v-if="$page.props.permissions.users.delete">Delete</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                >
                    <td>
                        <img
                            :src="user.avatar"
                            class="avatar"
                        />
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.registration_date }}</td>
                    <td
                        v-if="$page.props.permissions.users.delete"
                        class="flex justify-center align-center"
                    >
                        <Link
                            as="button"
                            type="button"
                            method="delete"
                            :href="route('users.destroy', { id: user.id })"
                            class="bg-red-500 w-6 h-6 rounded-full"
                        ></Link>
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>
</template>
