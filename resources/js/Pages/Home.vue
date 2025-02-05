<script setup>
    import PaginationLinks from '@/Components/PaginationLinks.vue';

    defineProps({
        users: Object,
    });
</script>

<template>
    <Head title="Homepage" />
    <div>
        <table>
            <thead>
                <tr class="bg-slate-300">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
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
                </tr>
            </tbody>
        </table>

        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>
</template>
