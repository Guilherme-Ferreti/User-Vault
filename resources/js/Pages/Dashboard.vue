<template>
    <div>
        <div v-if="$page.props.flash.message">
            <p
                class="p-4 text-sm"
                :class="
                    $page.props.flash.message.type === 'success'
                        ? 'bg-green-100'
                        : 'bg-red-100'
                "
                v-html="$page.props.flash.message.content"
            ></p>
        </div>

        <h1 class="title">Welcome back {{ $page.props.auth.user.name }}</h1>
    </div>
</template>
