<script setup>
    defineOptions({
        inheritAttrs: false,
    });

    const model = defineModel({
        type: null,
        required: true,
    });

    const props = defineProps({
        label: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'text',
        },
        error: String,
    });

    const id = props.label.replaceAll(' ', '-').toLowerCase();
</script>

<template>
    <div class="mb-6">
        <label :for="id">{{ label }}</label>
        <input
            v-model="model"
            :type="type"
            :id="id"
            v-bind="$attrs"
            :class="{ '!ring-red-500': error }"
        />
        <small
            v-if="error"
            class="error"
        >
            {{ error }}
        </small>
    </div>
</template>
